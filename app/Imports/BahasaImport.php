<?php

namespace App\Imports;

use App\Models\Bahasa;
use Maatwebsite\Excel\Concerns\ToModel;

class BahasaImport implements ToModel
{
    protected $count = 1;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(is_null($row[0])) {
            die("
                <style>
                *{
                    transition: all 0.6s;
                }
                
                html {
                    height: 100%;
                }
                
                body{
                    font-family: 'Lato', sans-serif;
                    color: #888;
                    margin: 0;
                }
                
                #main{
                    display: table;
                    width: 100%;
                    height: 100vh;
                    text-align: center;
                }
                
                .fof{
                      display: table-cell;
                      vertical-align: middle;
                }
                
                .fof h1{
                      font-size: 50px;
                      display: inline-block;
                      padding-right: 12px;
                      animation: type .5s alternate infinite;
                }
                
                @keyframes type{
                      from{box-shadow: inset -3px 0px 0px #888;}
                      to{box-shadow: inset -3px 0px 0px transparent;}
                }
                </style>

                <body>

                <div id='main'>
                        <div class='fof'>
                                <h2>Harap cek kembali karena terdapat kolom yang kosong, dan kolom tersebut wajib diisi</h2>
                        </div>
                </div>

                </body>
            
            ");
        }

        if($this->count != 1) {
            if(is_null($row[0])) {
                die("
                    <style>
                    *{
                        transition: all 0.6s;
                    }
                    
                    html {
                        height: 100%;
                    }
                    
                    body{
                        font-family: 'Lato', sans-serif;
                        color: #888;
                        margin: 0;
                    }
                    
                    #main{
                        display: table;
                        width: 100%;
                        height: 100vh;
                        text-align: center;
                    }
                    
                    .fof{
                          display: table-cell;
                          vertical-align: middle;
                    }
                    
                    .fof h1{
                          font-size: 50px;
                          display: inline-block;
                          padding-right: 12px;
                          animation: type .5s alternate infinite;
                    }
                    
                    @keyframes type{
                          from{box-shadow: inset -3px 0px 0px #888;}
                          to{box-shadow: inset -3px 0px 0px transparent;}
                    }
                    </style>
    
                    <body>
    
                    <div id='main'>
                            <div class='fof'>
                                    <h2>Harap cek kembali karena terdapat kolom yang kosong, dan kolom tersebut wajib diisi</h2>
                            </div>
                    </div>
    
                    </body>
                
                ");
            }

            return new Bahasa([
                'nama' => $row[0],
            ]);
        }

        $this->count += 1;
    }
}
