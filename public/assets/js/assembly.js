$(document).ready(function(){
    $(".useHead").click(function(){
        //change src
        $("#botHead").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botHead").attr('title', this.title);
        console.log("USE HEAD\n");
    });

    $(".useTorso").click(function(){
        //change src
        $("#botTorso").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botTorso").attr('title', this.title);
    });

    $(".useLegs").click(function(){
        //change src
        $("#botLegs").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botLegs").attr('title', this.title);
    });

    $(".returnHead").click(function(){
        //change src
        console.log(this.title);
        aja()
        .url('../assembly/returnHead/' + this.title + '/' + 1)
        .on('success', function(data){
        alert(data['msg']);
    })
    .go();

        location.reload();
        //change title
    });

    $(".returnTorso").click(function(){
        //change src

        console.log(this.title);

        aja()
        .url('../assembly/returnTorso/' + this.title + '/' + 1)
        .on('success', function(data){
        alert(data['msg']);
    })
    .go();

        location.reload();
        //change title
    });

    $(".returnLegs").click(function(){
        //change src
        console.log(this.title);
        aja()
        .url('../assembly/returnLegs/' + this.title + '/' + 1)
        .on('success', function(data){
        alert(data['msg']);
    })
    .go();
        location.reload();
        //change title
    });
    $(".buildBot").click(function(){
        //use parts
        //buildBot

        var part1 = parseInt($("#botHead").attr('title'));
        var part2 = parseInt($("#botTorso").attr('title'));
        var part3 = parseInt($("#botLegs").attr('title'));
        console.log(part1);
        console.log(part2);
        console.log(part3);
        if(parseInt(part1) != '0' && parseInt(part2) != '0' && parseInt(part3) != '0'){
            aja()
            .url('../assembly/buildRobot/' + part1 + '/' + part2 + '/' + part3)
            .on('success', function(data){
                alert(data['msg']);
            })
            .go();
        } else {
            alert("NOT ENOUGH PARTS");
        }
        console.log("LEgs" + part3);
    });
});
