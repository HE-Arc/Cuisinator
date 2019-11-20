@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid full-height">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>

        <div class="row fill-parent">
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments">

                        <div class="col-12 spaced-bottom">
                            <form class="form-inline">
                                <input class="form-control col" type="search" placeholder="Chercher un aliment" />
                                <button class="form-control btn btn-success justify-content-end" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        @foreach($aliments as $a)
                            <figure class="figure col-lg-4 col-md-12 col-sm-3 col-xs-6">
                                <div>
                                    <img src="{{ URL::asset('photos-aliments/' . ((!is_null($a->nom_photo))? $a->nom_photo : "default.jpg" )) }}"
                                         alt="{{$a->nom}}" class="figure-img rounded aliment-image-icon" />
                                </div>

                                <figcaption class="figure-caption">{{$a->nom}}</figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments-possedes">

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
