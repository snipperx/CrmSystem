@extends('layouts.default')

@section('title', 'Company Identity ')
@push('css')
  
<link href="/assets/css/task.css" rel="stylesheet"/>
@endpush
@section('content')
  <!-- begin breadcrumb -->
  <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item active">Managed Tables</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                            class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Data Table - Default</h4>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
       <!-- Nav -->

        <div class="box">
            <div class="input-group mb-3">
                <input type="text" class="inp form-control" placeholder="Please enter purpose" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-addon2">Add</button>
                </div>
            </div>
            <ul class='list-group list-group-flush'>

            </ul>
        </div>




        <!-- end panel-body -->
    </div>
@endsection
<script>
    let ul = document.querySelector('.list-group'),
        inp = document.querySelector('.inp'),
        btn = document.querySelector('.btn');

    TodoList();

    function TodoList(){

        btn.addEventListener('click', addElem);

        function addElem(){
            let li = document.createElement('li');
            let span = document.createElement('span');
            let imgDone = document.createElement('img');
            let imgClear = document.createElement('img');
            let imgImportant = document.createElement('img');
            let text = document.createElement('span');
            text.classList.add('text');
            span.classList.add('iconsBox');
            imgDone.classList.add('done');
            imgImportant.classList.add('important');
            imgClear.classList.add('clear');
            imgDone.src = 'https://sun9-21.userapi.com/c857620/v857620401/ece72/7GqaMjhxJPI.jpg';
            imgImportant.src = 'https://sun9-33.userapi.com/c857620/v857620892/eaf75/TXzryOXrPdQ.jpg'
            imgClear.src = 'https://sun9-27.userapi.com/c857620/v857620401/ece6b/gjP1XoL59lM.jpg';


            text.innerHTML = inp.value;
            inp.value = '';
            li.classList.add('li');

            imgDone.addEventListener('click',function active(){
                text.classList.toggle('active');
            })

            imgClear.addEventListener('click',function(){
                li.parentNode.removeChild(li)
            });

            imgImportant.addEventListener('click',function(){
                text.classList.toggle('import')
            });


            span.appendChild(imgDone);
            span.appendChild(imgImportant)
            span.appendChild(imgClear);
            li.appendChild(text)
            li.appendChild(span)
            ul.appendChild(li);
        }



    }


</script>
@push('scripts')
  
@endpush