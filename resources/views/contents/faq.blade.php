@extends('layouts.app')

@section('content')
    <div class="block bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header py-0" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        1. Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda
                                        dolorem doloremque inventore quia vel. Aperiam asperiores consequuntur dolores
                                        earum iusto nulla repudiandae sint sit sunt veniam. Dicta, repudiandae
                                        temporibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header py-0" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. It is a long established fact that a reader will be distracted ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                     moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header py-0" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. Contrary to popular belief, Lorem Ipsum is not simply random text?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid 3 wolf moon officia aute, non cupidatat.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header py-0" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        4. Various versions have evolved over the years, sometimes by accident?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid 3 wolf moon officia aute, non cupidatat.
                                    Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid 3 wolf moon officia aute, non cupidatat.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header py-0" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        5. The standard chunk of Lorem Ipsum used ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid 3 wolf moon officia aute, non cupidatat.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header py-0" id="headingSix">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        6. All the Lorem Ipsum generators on the Internet tend ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <div class="card-body">
                                    Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid 3 wolf moon officia aute, non cupidatat.
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
 

            </div>
        </div>
    </div>
@endsection