
$(function() {
    get_pemilih();

    // notify
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('79d45b5260ec23a92671', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function (data) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr["success"](data.message + ' selesai memilih!')

        // load pemilih
        get_pemilih();
    });
});

function get_pemilih()
{
    
    var bilik = $("#bilik").val();

    $.ajax({
        url:"/vote/get_pemilih/"+bilik,
        type:"get",
        datatype:"json",
        success:function(hasil) {
            var jSon = JSON.parse(hasil);
            if (jSon) {
                $.each(jSon, function(idx, row){
                    
                    if (row.length > 0) {
                        $("#id_pemilihan").val(row[0].id_pemilihan);
                        $("#nama_pemilih").html("Hallo, "+row[0].nama);
                        get_calon(); 
                    }
                });
            }
        }
    });
}

function get_calon() {
    
    $.ajax({
        url:"/vote/get_calon",
        type:"get",
        datatype:"json",
        success:function(hasil) {
            var jSon = JSON.parse(hasil);
            var id_pemilih = $("#id_pemilihan").val();
            
            $.each(jSon, function(idx, row) {
                
                if (row.length > 0) {
                    $.each(row, function(id, data){
                        var img = "";
                        if (data.foto) {
                            img = "<img class='card-img-top' src='/attachments/"+data.foto+"' width='500px' height='250px' alt='Card image cap'>";
                        } else {
                            img = "<img class='card-img-top' src='/img/boy.png' width='500px' height='250px' alt='Card image cap'>";
                        }
                            $("#landing_page_calon")
                                .append("<div class='col-lg-4 col-4 mx-auto' onclick='vote_calon("+id_pemilih+","+data.id+")'>"
                                            +"<div class='card text-center'>"
                                                +"<div class='card-header'><h2>"+(id+1)+"</h2></div>"
                                                +img 
                                                +"<div class='card-body'>"
                                                    +"<h3 id='nama_calon_"+data.id+"'>"+data.nama+"</h3>"
                                                +"</div>"
                                            +"</div>"
                                        +"</div>");
                    });
                }
            });
        }
    });
}



function vote_calon(id_pemilih, id_calon)
{

        Swal.fire({
            title: 'Anda yakin ingin memilih '+$("#nama_calon_"+id_calon).html()+'?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:"Tidak",
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"/vote/vote_calon/"+id_pemilih+"/"+id_calon,
                    type:"get",
                    datatype:"json",
                    success:function(hasil) {
                        
                        if (hasil == 1){
                            Swal.fire(
                                'Terpilih!',
                                'Terima kasih untuk tidak golput',
                                'success'
                                );
                                clear_box();
                                get_pemilih();
                        }else {
                            Swal.fire(
                                'Gagal!',
                                'Maaf proses memilih gagal',
                                'danger'
                            );
                        }
                    } 
                });
            }
        })
}

function clear_box()
{
    $("#landing_page_calon").html('');
}

