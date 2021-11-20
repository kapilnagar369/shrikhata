 <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center" style="position: fixed !important;">
                All Rights Reserved. Made With Love <span class="mdi mdi-heart pull-left"></span>

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url();?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>/dist/js/pages/chart/chart-page-init.js"></script>
     <!-- this page js -->
    <script src="<?php echo base_url();?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url();?>assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo base_url();?>assets/extra-libs/DataTables/datatables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.2/js/dataTables.rowGroup.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    

      <script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
      <script>
         function base64ToBlob(base64, mime) 
{
    mime = mime || '';
    var sliceSize = 1024;
    var byteChars = window.atob(base64);
    var byteArrays = [];

    for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    return new Blob(byteArrays, {type: mime});
}

         //convert table to image            
 function convertToImage() {
    showsnakbar("Sending Whatsapp");
     html2canvas(document.getElementById("zero_config"), {
         background :'#FFFFFF',
         onrendered: function(canvas) {
             var img = canvas.toDataURL("image/jpg");
             // result.innerHTML = '<a download="test.jpeg" href="'+img+'">test</a>';


             var image = img;
             var base64ImageContent = image.replace(/^data:image\/(png|jpg);base64,/, "");
             var blob = base64ToBlob(base64ImageContent, 'image/png');
             var formData = new FormData();
             formData.append('file', blob);

             $.ajax({
                     url: 'https://api.whtapi.co.in/smsfile.php?apikey=d78bbfd11b0b6811e52a4b412f12d8b3&phone=919806851570&msg=Hello aj please find Report',
                     type: "POST",
                     cache: false,
                     contentType: false,
                     processData: false,
                     data: formData
                 })
                 .done(function(e) {
                     console.log(e);
                     showsnakbar("Message Sent on Whatsapp");
                 });

         }
     });
 }
    

      </script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable({
             responsive: true,
             dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],fixedHeader: {
            header: true,
            footer: true
        }
        });
$('#zero_config2').DataTable({
             responsive: true,
             dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],fixedHeader: {
            header: true,
            footer: true
        }
        });



        $(document).ready(function () {    
            $("input[type='file']").attr('accept', 'image/png, image/gif, image/jpeg'); 
                $('#mobile').attr('type', 'text'); 
            $('#mobile').keypress(function (e) {    
        
                var charCode = (e.which) ? e.which : event.keyCode    
    
                if (String.fromCharCode(charCode).match(/[^+0-9]/g))    
    
                    return false;                        
    
            });    
    
        });   
 
    </script>
         
              <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
 $("#saveas").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
         
           // Get form
                var form = $('form')[0];
                var data, xhr;
                var data = new FormData(form);
                xhr = new XMLHttpRequest();

    xhr.open( 'POST', '<?php echo base_url('/index.php/Entry/savedraft')?>', true );
    xhr.onreadystatechange = function (  ) {
    // console.log(response);
         if (this.readyState == 4 && this.status == 200) {
         getExchangewiseReport();
       }
        showsnakbar('Data saved as draft.');
    
    };
    xhr.send( data );

});

  $("#submit").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
         
           // Get form
                var form = $('form')[0];
                var data, xhr;
                var data = new FormData(form);
                xhr = new XMLHttpRequest();

    xhr.open( 'POST', '<?php echo base_url('/index.php/Entry/saveEntry')?>', true );
    xhr.onreadystatechange = function ( response ) {
    console.log(response);
    
        showsnakbar('Data saved .');
          // window.location.assign("<?php echo base_url('index.php/Entry/details')?>")

    };
    xhr.send( data );

});
  
  $("#tallysubmit").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
         
           // Get form
                var form = $('form')[0];
                var data, xhr;
                var data = new FormData(form);
                xhr = new XMLHttpRequest();

    xhr.open( 'POST', '<?php echo base_url('/index.php/Ledger/saveTally')?>', true );
    xhr.onreadystatechange = function ( response ) {
    console.log(response);
    
        showsnakbar('Tally entry added.');
          // window.location.reload();

    };
    xhr.send( data );

});
  $("#tallybalsheetsubmit").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
         
           // Get form
                var form = $('form')[0];
                var data, xhr;
                var data = new FormData(form);
                xhr = new XMLHttpRequest();

    xhr.open( 'POST', '<?php echo base_url('/index.php/Balancesheet/saveTallyBalSheet')?>', true );
    xhr.onreadystatechange = function ( response ) {
    console.log(response);
    
        showsnakbar('Tally entry added.');
          // window.location.reload();

    };
    xhr.send( data );

});
});

  function getExchangewiseReport() {
    
     $postdata = {};
    $postdata["vouchar_no"]=$("#vouchar_no").val();
  $.post('<?php echo base_url("/index.php/Entry/getExchangewiseReport")?>',$postdata,function (data) {
console.log(data);
       $('.exchangewisereport tbody').empty();

$.each(JSON.parse(data), function(i, d) {
    var row='<tr>';
       row+='<td>'+(i+1)+'</td>';
    $.each(d, function(j, e) {
       row+='<td>'+e+'</td>';
    });
    row+='</tr>';
    $('.exchangewisereport tbody').append(row);

 });
      });
  		
  }

  function updateComment(txt,id) {
    
     $postdata = {};
    $postdata["trxn_id"]=id;
    $postdata["comments"]=txt;
  $.post('<?php echo base_url("/index.php/Ledger/updateComment")?>',$postdata,function (data) {

      console.log('done');

      });
      
  }
  function updateCommentbal(txt,id) {
    
  //    $postdata = {};
  //   $postdata["party_id"]=id;
  //   $postdata["comments"]=txt;
  // $.post('<?php echo base_url("/index.php/Ledger/updateComment")?>',$postdata,function (data) {

  //     console.log('done');

  //     });
      
  }
$(document).ready(function() {
 
 $('.sidebartoggler').click();
 		$('select').select2({
  				closeOnSelect: true
		});
});
let i=1;
function clone1(ch) {
    $('select').select2('destroy');  
    var $tr    = $(ch).closest('.tr_clone');
    var $clone = $tr.clone();
    $clone.find('input').val('');
    $clone.find('select').select2();
    $('select').select2();  
    $clone.find("select").attr("id",$clone.find("select").attr("id")+i);
    $clone.find(".partytd").attr("id",$clone.find(".partytd").attr("id")+i).text('');
    $clone.find(".ratetd").attr("id",$clone.find(".ratetd").attr("id")+i).text('0.00');
    $clone.find(".patitd").attr("id",$clone.find(".patitd").attr("id")+i).text('0.00');
    $clone.find(".comtd").attr("id",$clone.find(".comtd").attr("id")+i).text('0.00');
    $clone.find(".netamounttd").attr("id",$clone.find(".netamounttd").attr("id")+i).text('0.00');;
    $clone.find(".grossprofittd").attr("id",$clone.find(".grossprofittd").attr("id")+i).text('0.00');
    $clone.find(".finalamounttd").attr("id",$clone.find(".finalamounttd").attr("id")+i).text('0.00');
    $clone.find("input.pointtd").attr("id",$clone.find("input.pointtd").attr("id")+i);
    $clone.find("input.amounttd").attr("id",$clone.find("input.amounttd").attr("id")+i);
    $clone.find("input.partyin").attr("id",$clone.find("input.partyin").attr("id")+i);
    $clone.find("input.partyidin").attr("id",$clone.find("input.partyidin").attr("id")+i);
    $clone.find("input.ratein").attr("id",$clone.find("input.ratein").attr("id")+i);
    $clone.find("input.comin").attr("id",$clone.find("input.comin").attr("id")+i);
    $clone.find("input.netamountin").attr("id",$clone.find("input.netamountin").attr("id")+i);
    $clone.find("input.patiin").attr("id",$clone.find("input.patiin").attr("id")+i);
    $clone.find("input.finalamountin").attr("id",$clone.find("input.finalamountin").attr("id")+i);
    $clone.find("input.grossprofitin").attr("id",$clone.find("input.grossprofitin").attr("id")+i);
    $clone.find('input.pointtd').attr("readonly", true); 
    $('#Upline_Code').attr("disabled", true); 

$('#Idmaster_type').select2("enable", false)

    $clone.find("span.remove").css("display","block");
    $clone.find(".sno").text(parseInt($clone.find(".sno").text())+1)
   i++;
    $tr.after($clone);
    $(ch).attr("onclick", "").unbind("click");
    $(ch).attr("onfocusout", "").unbind("focusout");
   var scrollBottom = Math.max($('.table').height() - $('.table-responsive').height() + 20, 0);
   $('.table-responsive').scrollTop(scrollBottom);
   
}
$(document).on('keydown', '.select2', function(e) {
  if (e.originalEvent && e.which == 40) {
    e.preventDefault();
    $(this).siblings('select').select2('open');
  }
});

function getIdDetails(val) {
var thenum = $(val).attr('id').replace( /^\D+/g, '');
$('#partytd'+thenum).text($(val).find(':selected').attr('data-partyCcode'));
$('#ratetd'+thenum).text($(val).find(':selected').attr('data-rate'));
$('#pointtd'+thenum).val('');
$('#pointtd'+thenum).attr("readonly", false); 
$('#amounttd'+thenum).val('');
$('#patitd'+thenum).text('0.00');
$('#comtd'+thenum).text('0.00');
$('#netamounttd'+thenum).text('0.00');
$('#grossprofittd'+thenum).text('0.00');

$('#partyin'+thenum).val($(val).find(':selected').attr('data-partyCcode'));
$('#partyidin'+thenum).val($(val).find(':selected').attr('data-partyID'));
$('#ratein'+thenum).val($(val).find(':selected').attr('data-rate'));
$('#patiin'+thenum).val('0.00');
$('#comin'+thenum).val('0.00');
$('#netamountin'+thenum).val('0.00');
$('#grossprofitin'+thenum).val('0.00');

}
 <?php $amount_ratio=100; if($this->session->userdata('Client')) { 
    $amount_ratio = $this->session->userdata('Client')->amount_ratio;  
 } ?>


function calculateamount(val) {

   var thenum = $(val).attr('id').replace( /^\D+/g, '');
     if($('#pointtd'+thenum).val()>0){
      $('#pointtd'+thenum).css('background-color','green');
      $('#pointtd'+thenum).css('color','white');
     } else if($('#pointtd'+thenum).val()<0){
      $('#pointtd'+thenum).css('background-color','red');
      $('#pointtd'+thenum).css('color','white');
     }
   
   if($('#pointtd'+thenum).val()=='') 
	{
		return;
	}
   var amount = ($('#pointtd'+thenum).val()*$('#Idmaster'+thenum).find(':selected').attr('data-rate'))/<?php echo $amount_ratio; ?>;
$('#amounttd'+thenum).val(amount.toFixed(2));
$('#amountin'+thenum).val(amount.toFixed(2));

var patitype=$('#Idmaster'+thenum).find(':selected').attr('data-patitype');
var comtype=$('#Idmaster'+thenum).find(':selected').attr('data-comtype');
var pati=$('#Idmaster'+thenum).find(':selected').attr('data-pati');
var com=$('#Idmaster'+thenum).find(':selected').attr('data-com');
var rate = parseFloat($('#Idmaster'+thenum).find(':selected').attr('data-rate')).toFixed(2);

var patiamt=0;

var comamt =0;
var points =$('#pointtd'+thenum).val();
if(com!=0) {
   if(com>0 && points>0) {
        comamt = 0-((com*amount)/<?php echo $amount_ratio; ?>);
   }
   else if(com<0 && points<0) {
        comamt = ((com*amount)/<?php echo $amount_ratio; ?>);
   }
   else {
    comamt=0.00;
   }

    $('#comtd'+thenum).text(comamt.toFixed(2));  
    $('#comin'+thenum).val(comamt.toFixed(2));  
} else {
        $('#comtd'+thenum).text(0.00);  
}



var netamounttt = (amount+comamt-patiamt).toFixed(2);
$('#netamounttd'+thenum).text((amount+comamt-patiamt).toFixed(2)); 
$('#netamountin'+thenum).val((amount+comamt-patiamt).toFixed(2)); 



if(pati!=0) {
    if(patitype==0) { 
        var patiamt = 0-((netamounttt*pati)/<?php echo $amount_ratio; ?>);  } 
   

    else {  
     var pointttt = $('#pointtd'+thenum).val();
     patiamt = 0-((pointttt*pati)/<?php echo $amount_ratio; ?>);   } 


    $('#patitd'+thenum).text(patiamt.toFixed(2));  
    $('#patiin'+thenum).val(patiamt.toFixed(2));  
    $('#finalamounttd'+thenum).text((parseFloat(netamounttt)+parseFloat(patiamt)).toFixed(2));  
    $('#finalamountin'+thenum).val((parseFloat(netamounttt)+parseFloat(patiamt)).toFixed(2));  

} else {
    $('#patitd'+thenum).text(0.00);  
    $('#patiin'+thenum).val(0.00);  
    $('#finalamounttd'+thenum).text(netamounttt);  
    $('#finalamountin'+thenum).val(netamounttt);  
}


var pointtd = $('#pointtd'+thenum).val();  
 var exrate=$('#Idmaster'+thenum).find(':selected').attr('data-exrate');
 $('#grossprofittd'+thenum).text((((rate-exrate)*pointtd)/<?php echo $amount_ratio; ?>).toFixed(2)); 
 $('#grossprofitin'+thenum).val((((rate-exrate)*pointtd)/<?php echo $amount_ratio; ?>).toFixed(2)); 
var totalcommis=0;
$(".comtd").each(function(){
        totalcommis += +$(this).text();
        $("#totalcommis").val(totalcommis.toFixed(2));

});

var totalpatitd=0;
$(".patitd").each(function(){
        totalpatitd += +$(this).text();
        $("#totalpati").val(totalpatitd.toFixed(2));

});

var totalgrosspl=0;
$(".grossprofittd").each(function(){
        totalgrosspl += +$(this).text();
        $("#totalgrosspl").val(totalgrosspl.toFixed(2));

});
var amounttd =0;
$(".grossprofittd").each(function(){
        amounttd += +$(this).val();
        $("#totalnetpl").val((totalgrosspl+totalcommis+totalpatitd).toFixed(2));
         if((totalgrosspl+totalcommis+totalpatitd).toFixed(2)>0) {
            $("#totalnetpl").css('background-color','green');
            $("#totalnetpl").css('color','white');
         } else {
            $("#totalnetpl").css('background-color','red');
            $("#totalnetpl").css('color','white');
         }   
});

}




function calulatepoint(val) {
   
var thenum = $(val).attr('id').replace( /^\D+/g, '');
var amount = parseFloat(($('#amounttd'+thenum).val()*<?php echo $amount_ratio; ?>)).toFixed(2);
var rate = parseFloat($('#Idmaster'+thenum).find(':selected').attr('data-rate')).toFixed(2);
var res = (amount/rate).toFixed(2);
$('#pointtd'+thenum).val(res);  

var patitype=$('#Idmaster'+thenum).find(':selected').attr('data-patitype');
var comtype=$('#Idmaster'+thenum).find(':selected').attr('data-comtype');
var pati=$('#Idmaster'+thenum).find(':selected').attr('data-pati');
var com=$('#Idmaster'+thenum).find(':selected').attr('data-com');
var patiamt =0;
if(pati!=0) {
    if(patitype==0) {  patiamt = (res*pati)/<?php echo $amount_ratio; ?>100;  } 
    else {   patiamt = res*pati;   } 
    $('#patitd'+thenum).text(patiamt.toFixed(2));  

}
var comamt=0;
if($('#pointtd'+thenum).val()>0) {
 if(com!=0) {
    if(comtype==0) {   comamt = (res*com)/<?php echo $amount_ratio; ?>;} 
    else {   comamt = res*com;  } 
    $('#comtd'+thenum).text(comamt.toFixed(2));  
    }
 }
var amounttd =parseFloat($('#amounttd'+thenum).val());
 $('#netamounttd'+thenum).text(parseFloat(amount)-parseFloat(comamt)-parseFloat(patiamt)); 
 var pointtd = $('#pointtd'+thenum).val();  
 var exrate=$('#Idmaster'+thenum).find(':selected').attr('data-exrate');
 $('#grossprofittd'+thenum).text((((rate-exrate)*pointtd)/<?php echo $amount_ratio; ?>).toFixed(2)); 

}
function changeparty(party_code) {
  var start =  $('#start').val();
 var end =   $('#end').val();
     window.location.href='<?php  echo base_url('index.php/Ledger/details/') ?>'+party_code+'/'+start+'/'+end
   }

function myCallback(start, end) {
  var startdate=  start.format('YYYY-MM-DD')
  var enddate=  end.format('YYYY-MM-DD')
    $('#start').val(startdate);
    $('#end').val(enddate);
   if($('#party_code').val()!='') {
    var party_code= $('#party_code').val();
   window.location.href='<?php  echo base_url('index.php/Ledger/details/') ?>'+party_code+'/'+startdate+'/'+enddate
 }
}


$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  },myCallback);

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});


$(function(){

$("#alltrxn").click(function () {
    $(".trxn").prop('checked', $(this).prop('checked'));
});
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    dateFormat: 'yy-mm-dd' 
  }, myCallback);

    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   
    $('#date').attr('max', maxDate);
    if($('#date').val()=='') {
    
    
    $('#date').val(maxDate);
}
  $( ".exchangeWisecls" ).click(function() {
           $('.modal').modal({
        show: true
    });
           $("#saveas").click();
           });
});

function showsnakbar(msg) {
  var x = document.getElementById("snackbar");
  x.innerText='';
  x.innerText=msg;
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}


function askforpassword() {
   var person = prompt("Please enter password", "");
  if (person == '<?php echo  $_SESSION['Client']->password;?>') {
    
    return true;
  } else {
    alert('Incoorenct Password');
  }
}
function deleteentry(id) {
var answer = window.confirm("Are You Sure, Want to Delete This?");
if (answer) {
  var answer = window.confirm("Are You Sure, Want to Delete This?");
    var person = prompt("Please enter password", "");
  if (person == '<?php echo  $_SESSION['Client']->password;?>') {
    
    return true;
  } else {
    alert('Incoorenct Password');
  }
    return false;
  
}
else {
 
  return false;
}
 
  // window.location.href='<?php  echo base_url('index.php/Entry/deactiverecord/') ?>'+id;
}




$(document).ready(function() {
    var table = $('.grid').not('.initialized').addClass('initialized').show().DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 0, 'asc' ]],
        "stateSave": false,
    "stateDuration": 60*60*24*365,
    "displayLength": 100,
    "sScrollX": "100%",
    "dom": 'lfTrtip',
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            var colonne = api.row(0).data().length;
            var totale = new Array();
            totale['Totale']= new Array();
            var groupid = -1;
            var subtotale = new Array();

                
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {     
                if ( last !== group ) {
                    groupid++;
                    $(rows).eq( i ).before(
                        '<tr class="group"><td>'+group+'</td></tr>'
                    );
                    last = group;
                }
                
                                
                val = api.row(api.row($(rows).eq( i )).index()).data();      //current order index
                $.each(val,function(index2,val2){
                        if (typeof subtotale[groupid] =='undefined'){
                            subtotale[groupid] = new Array();
                        }
                        if (typeof subtotale[groupid][index2] =='undefined'){
                            subtotale[groupid][index2] = 0;
                        }
                        if (typeof totale['Totale'][index2] =='undefined'){ totale['Totale'][index2] = 0; }
                        
                        valore = Number(val2);
                        subtotale[groupid][index2] += valore;
                        totale['Totale'][index2] += valore;
                });
                
                
                
            } );                
    $('tbody').find('.group').each(function (i,v) {
                    var rowCount = $(this).nextUntil('.group').length;
            $(this).find('td:first').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': ' ('+rowCount+')' })));
            $(this).find('td:first').attr('colspan',4);
                         var subtd = '';
                        for (var a=2;a<colonne;a++)
                        { 
                            if(a==8 || a==7 || a==6 || a==5)
                            subtd += '<td>'+subtotale[i][a].toFixed(2)+'</td>';
                        }
                         $(this).append(subtd);
                });
            
        }
    } );
 
    // Collapse / Expand Click Groups
  $('.grid tbody').on( 'click', 'tr.group', function () {
        var rowsCollapse = $(this).nextUntil('.group');
        $(rowsCollapse).toggleClass('hidden');
    });

} );



$(document).ready(function() {
    var table = $('.grid2').not('.initialized').addClass('initialized').show().DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 0, 'asc' ]],
        "stateSave": false,
    "stateDuration": 60*60*24*365,
    "displayLength": 100,
    "sScrollX": "100%",
    "dom": 'lfTrtip',
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            var colonne = api.row(0).data().length;
            var totale = new Array();
            totale['Totale']= new Array();
            var groupid = -1;
            var subtotale = new Array();

                
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {     
                if ( last !== group ) {
                    groupid++;
                    $(rows).eq( i ).before(
                        '<tr class="group"><td>'+group+'</td></tr>'
                    );
                    last = group;
                }
                
                                
                val = api.row(api.row($(rows).eq( i )).index()).data();      //current order index
                $.each(val,function(index2,val2){
                        if (typeof subtotale[groupid] =='undefined'){
                            subtotale[groupid] = new Array();
                        }
                        if (typeof subtotale[groupid][index2] =='undefined'){
                            subtotale[groupid][index2] = 0;
                        }
                        if (typeof totale['Totale'][index2] =='undefined'){ totale['Totale'][index2] = 0; }
                        
                        valore = Number(val2);
                        subtotale[groupid][index2] += valore;
                        totale['Totale'][index2] += valore;
                });
                
                
                
            } );                
    $('tbody').find('.group').each(function (i,v) {
                    var rowCount = $(this).nextUntil('.group').length;
            $(this).find('td:first').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': ' ('+rowCount+')' })));
            $(this).find('td:first').attr('colspan',5);
                         var subtd = '';
                        for (var a=2;a<colonne;a++)
                        { 
                            if(a==8 || a==7 || a==6 || a==9)
                            subtd += '<td>'+subtotale[i][a].toFixed(2)+'</td>';
                        }
                         $(this).append(subtd);
                });
            
        }
    } );
 
    // Collapse / Expand Click Groups
  $('.grid2 tbody').on( 'click', 'tr.group', function () {
        var rowsCollapse = $(this).nextUntil('.group');
        $(rowsCollapse).toggleClass('hidden');
    });

} );

</script>
</body>

</html>

