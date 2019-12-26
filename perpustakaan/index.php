<html>
    <head>
        <!--menggunakan bootstrap CDN untuk mendapatkan source-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--memberi jarak-->
        <br>
            <div class="container">
                <div class="jumbotron"> <!--memberi efek kotak berwarna abu-abu dengan class jumbotron-->
                <button data-toggle="modal" data-target="#modaltambah"  class="btn btn-danger">Tambah Data Buku</button>

                <!--Modal untuk tambah data buku-->
                <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="proses.php?proses=tambah&id=" method="post">
                                    <div class="formgroup">
                                        <label>Nama Buku</label>
                                        <input type="text" name="namabuku" class="form-control" placeholder="Silahkan Masukan Nama Buku">
                                    </div>
                                    <div class="formgroup">
                                        <label>Jenis Buku</label>
                                        <select name="jenisbuku" class="form-control">
                                            <option value="Agama">Agama</option>
                                            <option value="Teknik">Teknik</option>
                                            <option value="Komputer">Komputer</option>
                                            <option value="Humor">Humor</option>
                                            <option value="Sains">Sains</option>
                                        </select>
                                    </div>
                                    <div class="formgroup">
                                        <label>Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control" placeholder="Silahkan Masukan Nama Pengarang Buku">
                                    </div>
                                    <div class="formgroup">
                                        <label>tahunterbit</label>
                                        <input type="year" name="tahunterbit" class="form-control" placeholder="Silahkan Masukan Tahun Terbit">
                                    </div>
                                    <div class="formgroup">
                                        <label>penerbit</label>
                                        <input type="text" name="penerbit" class="form-control" placeholder="Silahkan Masukan Penerbit">
                                    </div>
                                    <div class="formgroup">
                                        <label>ISBN</label>
                                        <input type="text" name="isbn" class="form-control" placeholder="Silahkan Masukan No ISBN">
                                    </div>
                            </div>
                                <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                    <table class="table table-striped" id="example" style="width:100%"> <!--menggunakan datatable client side-->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Buku</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Penerbit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';
                            $no=1;
                            $sql = "SELECT * FROM buku";
                            $data = $conn->query($sql);
                            foreach($data as $hasil){ ?> 
                            <tr>
                                <td><?=$no++; ?></td>
                                <td><?=$hasil['namabuku'];?></td>
                                <td><?=$hasil['pengarang'];?></td>
                                <td><?=$hasil['tahunterbit'];?></td>
                                <td><?=$hasil['penerbit'];?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#modaledit<?=$hasil['idbuku']; ?>" class="btn btn-primary">Edit</button>
                                    <div class="modal fade" id="modaledit<?=$hasil['idbuku']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="proses.php?proses=edit&id=<?=$hasil['idbuku'];?>" method="post">
                                                        <div class="formgroup">
                                                            <label>Nama Buku</label>
                                                            <input type="text" name="namabuku" value="<?=$hasil['namabuku'];?>" class="form-control" placeholder="Silahkan Masukan Nama Buku">
                                                        </div>
                                                        <div class="formgroup">
                                                            <label>Jenis Buku</label>
                                                            <select name="jenisbuku" class="form-control">
                                                                <option <?=$hasil['jenisbuku'] == 'Agama' ? 'selected':''; ?> value="Agama">Agama</option>
                                                                <option <?=$hasil['jenisbuku'] == 'Teknik' ? 'selected':''; ?> value="Teknik">Teknik</option>
                                                                <option <?=$hasil['jenisbuku'] == 'Komputer' ? 'selected':''; ?> value="Komputer">Komputer</option>
                                                                <option <?=$hasil['jenisbuku'] == 'Humor' ? 'selected':''; ?> value="Humor">Humor</option>
                                                                <option <?=$hasil['jenisbuku'] == 'Sains' ? 'selected':''; ?> value="Sains">Sains</option>
                                                            </select>
                                                        </div>
                                                        <div class="formgroup">
                                                            <label>Pengarang</label>
                                                            <input type="text" name="pengarang" class="form-control" value="<?=$hasil['pengarang'];?>" placeholder="Silahkan Masukan Nama Pengarang Buku">
                                                        </div>
                                                        <div class="formgroup">
                                                            <label>tahunterbit</label>
                                                            <input type="text" name="tahunterbit" class="form-control" value="<?=$hasil['tahunterbit'];?>" placeholder="Silahkan Masukan Tahun Terbit">
                                                        </div>
                                                        <div class="formgroup">
                                                            <label>penerbit</label>
                                                            <input type="text" name="penerbit" class="form-control" value="<?=$hasil['penerbit'];?>" placeholder="Silahkan Masukan Penerbit">
                                                        </div>
                                                        <div class="formgroup">
                                                            <label>ISBN</label>
                                                            <input type="text" name="isbn" class="form-control" value="<?=$hasil['ISBN'];?>" placeholder="Silahkan Masukan No ISBN">
                                                        </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="proses.php?proses=hapus&id=<?=$hasil['idbuku'];?>" class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
    </body>
</html>