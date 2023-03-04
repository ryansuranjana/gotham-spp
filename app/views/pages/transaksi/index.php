<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-5 text-gray-800">Entry Transaksi</h1>
        </div>
    </div>
    <!-- Page Heading -->

    <div class="row justify-content-center mb-2">
        <div class="col-md-6 col-12">
            <form id="form-search">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Nis" id="nis-input">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mb-2 d-none" id="table-widget">
        <div class="col-md-8 col-12">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 55%;">Nama</td>
                        <td>Kelas</td>
                        <td style="width: 15%;">Action</td>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>
<script type="application/javascript">
    $(document).ready(function() {
        const siswa = JSON.parse('<?= json_encode($data['siswa']) ?>')
        
        $('#form-search').on('submit', function(e) {
            e.preventDefault()
            $('#table-widget').removeClass('d-none')
            $('#tbody').html(' ')

            const siswaFilter = siswa.filter((row) => row.nis == $('#nis-input').val())
            if(siswaFilter.length > 0) {
                $('#tbody').html(`
                    <tr>
                        <td>${siswaFilter[0].nama}</td>
                        <td>${siswaFilter[0].kelas_nama} ${siswaFilter[0].kelas_kompetensi_keahlian}</td>
                        <td><a href="" class="btn btn-sm btn-secondary" >Bayar</a></td>
                    </tr>
                `)
            } else {
                $('#tbody').html(`
                    <tr>
                        <td colspan="3" class="text-center">Siswa tidak ditemukan!</td>
                    </tr>
                `)
            }
        })
    })
</script>