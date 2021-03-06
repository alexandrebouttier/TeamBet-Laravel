@extends('layouts/default')

@section('content')

<div class="container">
    <h2 class="text-center">Pronostics</h2>
    <h5 class="text-center">Mes pronostics en cours</h5>
    <div class="flex_row">
            @if ($nbBets>0)
        @foreach ($bets as $bet)
                <div class="card bet_post" style="width: 300px;">

                    <div class="card-body">
                        <h5 class="card-title">
                            @if($bet-> type == "Combiné")
                                @if($bet-> event && $bet-> event_2 )
                                    {{str_limit($bet-> event ."+".$bet-> event_2 ,45,' [...]')}}
                                @elseif($bet-> event && $bet-> event_2  && $bet-> event_3)
                                {{str_limit($bet-> event ."+".$bet-> event_2 ."+". $bet-> event_3 ,45,' [...]')}}
                                @elseif($bet-> event && $bet-> event_2  && $bet-> event_3 && $bet-> event_4)
                                {{str_limit($bet-> event ."+".$bet-> event_2 ."+". $bet-> event_3."+". $bet-> event_4  ,45,' [...]')}}
                                @endif
                            @else
                                {{str_limit($bet -> event, 45, ' [...]')}}
                            @endif
                            </h5>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bet N° {{$bet-> id}}</li>
                        <li class="list-group-item">Publié le :
                        {{  date("d/m/Y à H:i", strtotime($bet->created_at))}}</li>
                        <li class="list-group-item">Type de pari : {{$bet-> type}}</li>
                        <li class="list-group-item">Cote du pari : {{$bet-> cost}}</li>
                        <li class="list-group-item">Date du match : {{ date("d/m/Y", strtotime($bet->date_event))}}</li>
                        <li class="list-group-item">Heure du match : {{ date("H:i", strtotime($bet->hour_event))}}</li>
                    </ul>

                    <div class="card-body text-center bg-white">
                        <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}" class="btn btn-info my-2 my-sm-0">Voir le pronostic</a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="center alert alert-primary" role="alert">
                   Il y a aucun pronostics en cours !
                </div>
                @endif

            <!-- // flex_row -->
    </div>
    {{ $bets->links() }}
    <!-- // container -->
    <div style="margin-top:1em;"class="pub text-center">
            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='728' height='90' src="https://wlbetclicfr.adsrv.eacdn.com/I.ashx?btag=a_2738b_694c_&affid=1931&siteid=2738&adid=694&c=" ></iframe>
    </div>
    
</div>



@endsection
