(function() {
    $(document).ready(function(){

      // sembunyikan form kabupaten, kecamatan dan desa
      $("#form_kab").hide();
      $("#form_kec").hide();
      $("#form_des").hide();

      // ambil data kabupaten ketika data memilih provinsi
      $('body').on("change","#form_prov",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=kabupaten";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_kab").html(hasil);
            $("#form_kab").show();
            $("#form_kec").hide();
            $("#form_des").hide();
          }
        });
      });

      // ambil data kecamatan/kota ketika data memilih kabupaten
      $('body').on("change","#form_kab",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=kecamatan";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_kec").html(hasil);
            $("#form_kec").show();
            $("#form_des").hide();
          }
        });
      });

      // ambil data desa ketika data memilih kecamatan/kota
      $('body').on("change","#form_kec",function(){
        var id = $(this).val();
        var data = "id="+id+"&data=desa";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_des").html(hasil);
            $("#form_des").show();
          }
        });
      });


    })).call(this);