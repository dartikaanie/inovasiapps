<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>


@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anggita Tim
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'anggotaTims.store']) !!}
                        @include('peserta.tims.anggota_tims.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    $(document).ready(function(){
        $('.selectpicker').selectpicker();

        $('#framework').change(function(){
            $('#hidden_framework').val($('#framework').val());
        });

        $('#multiple_select_form').on('submit', function(event){
            event.preventDefault();
            if($('#framework').val() != '')
            {
                var form_data = $(this).serialize();
                $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        //console.log(data);
                        $('#hidden_framework').val('');
                        $('.selectpicker').selectpicker('val', '');
                        alert(data);
                    }
                })
            }
            else
            {
                alert("Please select framework");
                return false;
            }
        });
    });
</script>

