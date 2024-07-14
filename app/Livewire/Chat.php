<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Chat extends Component
{
    #[Rule('required|min:2')]
    public $message = '';
    
    public $sender="";


    public function render()
    {
        $this->makeCreator();
        Carbon::setLocale('fa');
        $chats = Message::where('status', 1)->get();
        return view('livewire.chat')->with('chats', $chats)->with('sender', $this->sender);
    }
    public function send()
    {
        $this->validateOnly('message');
        Message::create([
            'message' => $this->message,
            'creator' => $this->sender,
        ]);

        session()->flash('status', 'ارسال شد.');
        $this->reset('message');
    }
    public function delete($id)
    {
        $m = Message::find($id);
        $m->status = 2;
        $m->save();
    }
    // private function  getColorString()
    // {
    //     $ip = \Request::ip();
    //     $parts = explode(".",$ip);
    //     return "#".dechex($parts[1]).dechex(255-(intval($parts[2]))).dechex(255-(intval($parts[3])));
    // }
    private function makeCreator(){
        if ($this->sender == "") {
            $this->sender = $this->getColorString();
        }
    }
    private function getColorString() {
        $map = [
            0 => 200, 1 => 187, 2 => 153, 3 => 172, 4 => 198, 5 => 176, 6 => 241, 7 => 180,
            8 => 219, 9 => 222, 10 => 151, 11 => 174, 12 => 248, 13 => 226, 14 => 161, 15 => 179,
            16 => 191, 17 => 208, 18 => 159, 19 => 245, 20 => 231, 21 => 224, 22 => 184, 23 => 227,
            24 => 194, 25 => 205, 26 => 154, 27 => 171, 28 => 203, 29 => 160, 30 => 239, 31 => 156,
            32 => 185, 33 => 223, 34 => 175, 35 => 209, 36 => 207, 37 => 214, 38 => 229, 39 => 237,
            40 => 192, 41 => 240, 42 => 177, 43 => 217, 44 => 163, 45 => 238, 46 => 211, 47 => 188,
            48 => 186, 49 => 165, 50 => 170, 51 => 162, 52 => 225, 53 => 246, 54 => 210, 55 => 182,
            56 => 181, 57 => 206, 58 => 249, 59 => 233, 60 => 178, 61 => 158, 62 => 232, 63 => 204,
            64 => 157, 65 => 169, 66 => 252, 67 => 202, 68 => 189, 69 => 218, 70 => 212, 71 => 244,
            72 => 243, 73 => 250, 74 => 213, 75 => 230, 76 => 215, 77 => 236, 78 => 221, 79 => 216,
            80 => 155, 81 => 190, 82 => 228, 83 => 164, 84 => 242, 85 => 195, 86 => 168, 87 => 251,
            88 => 193, 89 => 201, 90 => 199, 91 => 253, 92 => 247, 93 => 220, 94 => 235, 95 => 182,
            96 => 173, 97 => 152, 98 => 167, 99 => 255, 100 => 246, 101 => 190, 102 => 218, 103 => 214,
            104 => 255, 105 => 176, 106 => 169, 107 => 207, 108 => 154, 109 => 199, 110 => 251, 111 => 213,
            112 => 193, 113 => 232, 114 => 163, 115 => 217, 116 => 192, 117 => 180, 118 => 155, 119 => 248,
            120 => 178, 121 => 179, 122 => 244, 123 => 171, 124 => 152, 125 => 249, 126 => 160, 127 => 243,
            128 => 240, 129 => 204, 130 => 188, 131 => 210, 132 => 162, 133 => 225, 134 => 185, 135 => 189,
            136 => 202, 137 => 198, 138 => 201, 139 => 216, 140 => 223, 141 => 199, 142 => 209, 143 => 220,
            144 => 215, 145 => 175, 146 => 159, 147 => 161, 148 => 200, 149 => 222, 150 => 206, 151 => 178,
            152 => 221, 153 => 182, 154 => 241, 155 => 212, 156 => 237, 157 => 184, 158 => 179, 159 => 208,
            160 => 219, 161 => 204, 162 => 185, 163 => 227, 164 => 154, 165 => 188, 166 => 158, 167 => 213,
            168 => 177, 169 => 245, 170 => 232, 171 => 244, 172 => 253, 173 => 226, 174 => 255, 175 => 183,
            176 => 195, 177 => 250, 178 => 214, 179 => 206, 180 => 199, 181 => 220, 182 => 217, 183 => 192,
            184 => 195, 185 => 210, 186 => 194, 187 => 162, 188 => 167, 189 => 240, 190 => 187, 191 => 172,
            192 => 243, 193 => 158, 194 => 169, 195 => 205, 196 => 178, 197 => 176, 198 => 179, 199 => 151,
            200 => 157, 201 => 190, 202 => 194, 203 => 233, 204 => 181, 205 => 211, 206 => 241, 207 => 205,
            208 => 245, 209 => 171, 210 => 202, 211 => 209, 212 => 165, 213 => 223, 214 => 161, 215 => 240,
            216 => 254, 217 => 211, 218 => 186, 219 => 159, 220 => 249, 221 => 197, 222 => 203, 223 => 239,
            224 => 163, 225 => 207, 226 => 231, 227 => 204, 228 => 175, 229 => 180, 230 => 252, 231 => 216,
            232 => 157, 233 => 155, 234 => 251, 235 => 190, 236 => 254, 237 => 195, 238 => 174, 239 => 237,
            240 => 221, 241 => 230, 242 => 168, 243 => 226, 244 => 212, 245 => 185, 246 => 166, 247 => 219,
            248 => 244, 249 => 232, 250 => 152, 251 => 156, 252 => 173, 253 => 234, 254 => 172, 255 => 197
        ];
        $ip = \Request::ip();
        $parts = explode(".",$ip);
        return "#".dechex($map[$parts[1]]).dechex($map[$parts[2]]).dechex($map[$parts[3]]);
    }
}