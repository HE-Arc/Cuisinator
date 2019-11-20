@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid full-height">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>

        <div class="row fill-parent">
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments">
                        <div class="row w-100 mx-auto">
                            <div class="col-12 spaced-bottom">
                                <form class="form-inline">
                                    <input class="form-control col" type="search" placeholder="Chercher un aliment" />
                                    <button class="form-control btn btn-success justify-content-end" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="row mb-auto">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($aliments as $a)
                            <figure class="figure col-lg-4 col-md-12 col-sm-3 col-xs-6 draggable" draggable="true" ondragstart="drag(event)" id="{{$loop->index}}" ondrop="return false;" ondragover="return false;">
                                <div class="" ondrop="return false;" ondragover="return false;">
                                    <img src="{{ URL::asset('photos-aliments/' . ((!is_null($a->nom_photo))? $a->nom_photo : "default.jpg" )) }}"
                                         alt="{{$a->nom}}" class="figure-img rounded aliment-image-icon" ondrop="return false;" ondragover="return false;" />
                                </div>
                                <figcaption class="figure-caption" ondrop="return false;" ondragover="return false;">{{$a->nom}}</figcaption>
                            </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments-possedes" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div class="row mb-auto">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-recettes">

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        function allowDrop(ev) {
            ev.preventDefault();
            ev.dataTransfer.dropEffect = "move";
        }

        function preventDrop(ev) {
            ev.preventDefault();
            return false;
        }

        function drag(ev) {
            ev.dataTransfer.setData("text/plain", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            var data = ev.dataTransfer.getData("text/plain");
            // console.log(data);
            // console.log(ev.target.childNodes[1]);
            ev.target.childNodes[1].appendChild(document.getElementById(data));
        }
    </script>
@endsection
