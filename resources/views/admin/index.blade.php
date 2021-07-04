@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">


        {{--//________________________________________________---}}
        <div class="row">

         @for($i=0;$i<20;$i++)
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>FLN-VIDEO1</h3>


                        <div align="center" class="col">


                            <input type="text" class="knob" data-readonly="true" value="44" data-width="60"
                                   data-height="60"
                                   data-fgColor="#00c0ef">

                            <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                                   data-height="60"
                                   data-fgColor="#00c0ef">

                        </div>

                        {{--                        <div align="center" class="col">CPU / LAN</div>--}}

                    </div>
                    <div class="icon">
                        <i class="fas fa-kiwi-bird"></i>
                    </div>
                    <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endfor
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footerrrrrrr
        </div>
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
