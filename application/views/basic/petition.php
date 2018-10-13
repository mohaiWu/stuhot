<div id="petition" class="ts-block">
    <div class="container">
        <div class="ts-title">
            <h2>連署牆</h2>
        </div>
        <div id="cardDiv" class="card-columns ts-column-count-sm-2 ts-column-count-md-2 ts-column-count-lg-3 ts-column-count-xl-4">
            
        </div>
        <!--end card-columns-->
        <div class="text-center mt-5">
            <a href="javascript:void(0)" id="moreButton" onclick="loadPetition()" class="btn btn-outline-primary border-0" data-bg-color="#ebf1fe">載入更多</a>
        </div>
    </div>
    <!--end container-->
</div>
<script>
    var start = 0;
    $(window).load(function() {
        loadPetition();
    });
    function loadPetition(){
        $.ajax({
            url: base_url('home/getAllPetition'),
            type: 'POST',
            dataType: 'json',
            data: {start: start}
        })
        .done(function(json) {
            if(json.length == 11){
                start += 10;
                for(var i=0;i<json.length-1;i++){
                    $('#cardDiv').append('<div class="card"><div class="card-body"><div class="d-flex align-items-center"><h5>'+json[i]['name']+'</h5><h5>'+json[i]['number']+'</h5></div><p class="mb-0">'+json[i]['opinion']+'</p></div></div>');
                }
            }else{
                $('#moreButton').hide();
                for(var i=0;i<json.length;i++){
                    $('#cardDiv').append('<div class="card"><div class="card-body"><div class="d-flex align-items-center"><h5>'+json[i]['name']+'</h5><h5>'+json[i]['number']+'</h5></div><p class="mb-0">'+json[i]['opinion']+'</p></div></div>');
                }
            }
        })
        .fail(function() {
            alert('無法取得目前連署資訊');
        });
    }
</script>