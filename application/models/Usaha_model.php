<?php

class Usaha_model extends CI_Model
{

    public function getUsaha($id = null)
    {
        if ($id === null) {
            return $this->db->get('usaha')->result();
        } else {
            return $this->db->get_where('usaha', ['id' => $id])->result();
        }
    }

    public function getProduk($id = null)
    {
        if ($id == null) {
            return $this->db->get('hasil_product')->result();
        } else {
            return $this->db->get_where('hasil_product', ['id_kups' => $id])->result();
        }
    }

    public function getKups($id = null)
    {
        if ($id === null) {
            return $this->db->get('kups')->result();
        } else {
            return $this->db->get_where('kups', ['id' => $id])->result();
        }
    }

    public function deleteUsaha($id)
    {
        $this->db->delete('usaha', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createUsaha($data)
    {
        $this->db->insert('usaha', $data);
        return $this->db->affected_rows();
    }

    public function updateUsaha($data, $id)
    {
        $this->db->update('usaha', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
