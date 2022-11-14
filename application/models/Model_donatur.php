<?php

class Model_donatur extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tbl_donatur');
    }

    public function tambah_donatur($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function detail_donatur($id)
    {
        $result = $this->db->where('id_dnt', $id)->get('tbl_donatur');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    // public function edit_donatur($where, $table)
    // {
    //     return $this->db->get_where($table, $where);
    // }

    public function edit_donatur($where)
    {
        $this->db->select('tbl_donatur.id_dnt, tbl_user.id, tbl_donatur.nama, tbl_donatur.email, tbl_donatur.alamat, tbl_donatur.no_wa, tbl_donatur.password, tbl_donatur.id_user, tbl_donatur.gambar');

        $this->db->from('tbl_donatur');
        // $this->db->join('tbl_user', 'tbl_donatur.id_user = tbl_user.id', 'left');
        $this->db->join('tbl_user', 'tbl_donatur.email = tbl_user.email', 'left');
        $this->db->where('tbl_donatur.id_dnt', $where);
        return $this->db->get()->result();
    }

    public function update_donatur($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function hapus_donatur($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tampil_donasi($email_donatur)
    {
        // return $this->db->get('tbl_donasi');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_donatur', 'tbl_donatur.email = tbl_donasi.email_donatur', 'left');
        $this->db->join('tbl_admin', 'tbl_admin.id_adm = tbl_donasi.id_admin', 'left');
        $this->db->where('tbl_donasi.email_donatur', $email_donatur);
        return $this->db->get()->result();
    }
}
