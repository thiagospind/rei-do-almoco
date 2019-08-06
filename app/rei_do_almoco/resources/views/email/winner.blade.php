<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container-fluid">
        <table class="justify-content-center" align="center" border="0" cellpadding="0" cellspacing="0" >
            <tr>
                <td align="center" style="padding: 0 0 10px 0;">
                    <img src="{{ $message->embed(public_path().'/img/crown.svg')}}" alt="Rei do Almoço" style="display: block;" />
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 10px 10px 10px 10px;">
                    <h2>Parabéns {{$winVote[0]->name}}, você foi eleito o rei do almoço de hoje!</h2>
                    <h4>Você recebeu {{$winVote[0]->votes}} votos! Continue assim para ser eleito o vencedor da semana.</h4>
                    <h4>Boa sorte!</h4>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
