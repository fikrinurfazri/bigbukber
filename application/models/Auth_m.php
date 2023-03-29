<?php

class Auth_m extends CI_Model
{
    private $_table = "admin";
    const SESSION_KEY = 'ID_ADMIN';

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[255]'
            ]
        ];
    }

    public function login($username, $password)
    {
        $this->db->where('USERNAME', $username);
        $query = $this->db->get($this->_table);
        $admin = $query->row();

        // cek apakah user sudah terdaftar?
        if (!$admin) {
            return FALSE;
        }

        // cek apakah passwordnya benar?
        if (!password_verify($password, $admin->PASSWORD)) {
            return FALSE;
        }

        // bikin session
        $this->session->set_userdata([self::SESSION_KEY => $admin->ID_ADMIN]);
        $this->_update_last_login($admin->ID_ADMIN);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $ID_ADMIN = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['ID_ADMIN' => $ID_ADMIN]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    private function _update_last_login($id)
    {
        $ID_ADMIN = $this->session->userdata(self::SESSION_KEY);
        $data = [
            'last_login' => date("Y-m-d H:i:s"),
        ];

        return $this->db->update($this->_table, $data, ['ID_ADMIN' => $ID_ADMIN]);
    }
}
