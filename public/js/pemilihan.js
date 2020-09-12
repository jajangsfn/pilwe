$(function() {
    load_pemilih();
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
        load_pemilih();
        get_pemilih();
    });
});

function load_pemilih() {
    $.ajax({
        url:"/pemilihan/data_pemilih",
        type:"get",
        datatype:"json",
        success:function(hasil) {
            jSon = JSON.parse(hasil);
            $("#pemilih").html('<option value="">Pilih Nama</option>');
            if(hasil.length > 0 ){
                
                $.each(jSon, function(id, row) {
                    $.each(row, function(idx, data) {
                        $("#pemilih")
                            .append("<option value='"+data.id+"'>"+data.nik+'-'+data.nama)
                            .append("</option>");
                    });
                });
            }
        }
    });

    $("#pemilih").select2();
} 

function tempatkan() {
    var e = document.getElementById("pemilih");
    var id_pemilih = e.options[e.selectedIndex].value;
    var id_bilik   = document.getElementById("bilik_suara").value;

    if (id_pemilih && id_bilik) {
        
        $.ajax({
            url:"/pemilihan/tempatkan/"+id_pemilih+"/"+id_bilik,
            type:"get",
            datatype:"json",
            success:function(msg) {
                load_pemilih();
                $("#bilik_suara").val('').trigger('change.select2');
                get_pemilih();
            }
        });
        
    }else if (!id_pemilih && id_bilik){
        alert('Silahkan pilih Pemilih');
    }else  if (id_pemilih && !id_bilik){
        alert('Silahkan pilih Bilik Suara');
    }else {
        alert('Silahkan pilih Pemilih & Bilik Suara');
    }
}

function get_pemilih() {

    $.each($(".bilik"), function(idx, row) {
        var id_bilik = $(row).attr("id").split("id_bilik_")[1];
        
        $.ajax({
            url:"/pemilihan/get_pemilih/"+id_bilik,
            type:"get",
            datatype:"json",
            success:function(hasil) {
                var jSon = JSON.parse(hasil);
                
                $.each(jSon, function(idx, data){
                    $("#id_bilik_"+id_bilik).html('');
                    if (data.length > 0) {

                        $.each(data, function(id, row){
                            $("#id_bilik_"+id_bilik)
                                .append("<div class='alert alert-primary'>"
                                        +row.nik+"-"+row.nama
                                        +"<button type='button' class='close' onclick='hapus_pemilih("+row.id_pemilihan+")'>"
                                        +"<span aria-hidden='true'>&times;</span>"
                                        +"</button>"
                                        +"</div>");
                        });
                    }
                });               
            }
        });
    });
}

function hapus_pemilih(id) {
    
    if (confirm('Anda yakin?')) {
        $("#loading").modal('show');
        $.ajax({
            url:"/pemilihan/hapus_pemilih/"+id,
            type:"get",
            datatype:"json",
            success:function(msg) {
                load_pemilih();
                get_pemilih();
                $("#loading").modal('hide');
            }
        });
        
    }
}