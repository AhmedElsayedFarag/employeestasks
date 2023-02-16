@php
    $url = explode('/',url()->current());
    array_splice($url,0,4);
    $urls = [];
    foreach ($url as $l){
        if ($l == 'branches'){
            $urls[] = [
                'name'=>trans('sidebar.branches'),
                'route'=>route('admin.branches.index')
                ];
        }elseif ($l == 'create'){
             $urls[] = [
                'name'=>trans('sidebar.add'),
                'route'=>'',
                ];
        }elseif ($l == 'edit'){
             $urls[] = [
                'name'=>trans('sidebar.edit'),
                'route'=>'',
                ];
        }elseif ($l == 'management'){
             $urls[] = [
                'name'=>trans('sidebar.management'),
                'route'=>route('admin.branches.management.index',request()->route('branch'))
                ];
        }elseif ($l == 'departments'){
             $urls[] = [
                'name'=>trans('sidebar.department'),
                'route'=>route('admin.branches.management.departments.index',[request()->route('branch'),request()->route('management')])
                ];
        }elseif ($l == 'units'){
             $urls[] = [
                'name'=>trans('sidebar.unit'),
                'route'=>route('admin.branches.management.departments.units.index',[request()->route('branch'),request()->route('management'),request()->route('department')])
                ];
        }elseif ($l == 'contracts'){
             $urls[] = [
                'name'=>trans('sidebar.contract_types'),
                'route'=>route('admin.contracts.index')
                ];
        }elseif ($l == 'jobs'){
             $urls[] = [
                'name'=>trans('sidebar.jobs'),
                'route'=>route('admin.jobs.index')
                ];
        }elseif ($l == 'employees'){
             $urls[] = [
                'name'=>trans('sidebar.employees'),
                'route'=>route('admin.employees.index')
                ];
        }elseif ($l == 'attendance'){
             $urls[] = [
                'name'=>trans('sidebar.attendance'),
                'route'=>''
                ];
        }
        elseif ($l == 'home-care'){
             $urls[] = [
                'name'=>trans('sidebar.home_care'),
                'route'=>''
                ];
        }
        elseif ($l == 'requests'){
             $urls[] = [
                'name'=>trans('sidebar.requests'),
                'route'=>''
                ];
        }
    }//end foreach
@endphp


<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{end($urls)['name']}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        @foreach($urls as $link)
                            @if($link['route'] != '' && end($urls)['name'] !=$link['name'])
                                <li class="breadcrumb-item"><a href="{{$link['route']}}">{{$link['name']}}</a>
                                </li>
                            @endif
                        @endforeach

                        <li class="breadcrumb-item active">{{end($urls)['name']}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(end($urls)['name'] == trans('sidebar.requests'))
        @php
            if (auth()->check()){
                $pending_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','pending')->count();
                $coordination_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','coordination')->count();
                $processing_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','processing')->count();
                $done_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','done')->count();
                $rejected_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','rejected')->count();
                $canceled_requests = \App\HomeCareRequest::whereIn('branch_id',auth()->user()->establishment->branches()->pluck('id'))->where('status','canceled')->count();
            }
        @endphp
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'pending'])}}"><span class="menu-title" >{{trans('sidebar.requests')}} <span class="badge badge-warning">{{$pending_requests}}</span></span></a>
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'coordination'])}}"><span class="menu-title" >{{trans('sidebar.coordination')}} <span class="badge badge-info">{{$coordination_requests}}</span></span></a>
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'processing'])}}"><span class="menu-title" >{{trans('sidebar.processing')}} <span class="badge badge-success">{{$processing_requests}}</span></span></a>
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'done'])}}"><span class="menu-title" >{{trans('sidebar.done')}} <span class="badge badge-success">{{$done_requests}}</span></span></a>
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'rejected'])}}"><span class="menu-title" >{{trans('sidebar.rejected')}} <span class="badge badge-danger">{{$rejected_requests}}</span></span></a>
                    <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'canceled'])}}"><span class="menu-title" >{{trans('sidebar.canceled')}} <span class="badge badge-danger">{{$canceled_requests}}</span></span></a>
                </div>
            </div>
        </div>
    </div>
    @endif

{{--    @if($url[1] == 'prescriptions' && end($url) == 'edit')--}}
{{--        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">--}}
{{--            <div class="form-group breadcrum-right">--}}
{{--                <div class="dropdown">--}}
{{--                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        <a class="dropdown-item" href="javascript:void(0)" onclick="launchModal('{{route('admin.drugs.index')}}','{{trans('sidebar.drug_chart')}}')"><span class="menu-title" >{{trans('sidebar.drug_chart')}}</span></a>--}}
{{--                        <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'coordination'])}}"><span class="menu-title" >{{trans('sidebar.vital_signs')}}</span></a>--}}
{{--                        <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'processing'])}}"><span class="menu-title" >{{trans('sidebar.trp')}}</span></a>--}}
{{--                        <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'done'])}}"><span class="menu-title" >{{trans('sidebar.pressure_uicer')}}</span></a>--}}
{{--                        <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'rejected'])}}"><span class="menu-title" >{{trans('sidebar.eligibility_assessment')}}</span></a>--}}
{{--                        <a class="dropdown-item" href="{{route('admin.requests.index',['type'=>'canceled'])}}"><span class="menu-title" >{{trans('sidebar.nursing_notes')}}</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

</div>
