<?php

use App\Models\CauTraLoi;

class CauTraLoiService{
    public function getAll()
    {
        return CauTraLoi::all();
    }

    public function getOne(CauTraLoi $cauTraLoi)
    {
        return $cauTraLoi;
    }

    public function add(array $data)
    {
        return CauTraLoi::create($data);
    }

    public function update(array $data, CauTraLoi $cauTraLoi)
    {
        $cauTraLoi->update($data);
        return $cauTraLoi;
    }

    public function delete(CauTraLoi $cauTraLoi)
    {
        return $cauTraLoi->delete();
    }
}