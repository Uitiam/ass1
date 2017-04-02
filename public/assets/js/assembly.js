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

    $(".returnPart").click(function(){
        //change src
        aja()
          .url('../assembly/returnPart/' + this.id)
          .on('success', function(data){
              console.log(data['msg']);
          })
          .go();
        //change title
    });

    $(".buildBot").click(function(){
        //use parts
        //buildBot
        var part1 = $("#botHead").attr('title');
        var part2 = $("#botTorso").attr('title');
        var part3 = $("#botLegs").attr('title');
        aja()
          .url('../assembly/buildRobot/' + part1 + '/' + part2 + '/' + part3)
          .on('success', function(data){
              console.log(data['msg']);
          })
          .go();


    });
});
