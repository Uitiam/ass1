$(document).ready(function(){
    $(".useHead").click(function(){

        //change src
        $("#botHead").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botHead").attr('title', this.title);
        console.log("USE HEAD\n");
    });

    $(".useTorso").click(function(){
        console.log("USE TORSO\n");
        //change src
        $("#botTorso").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botTorso").attr('title', this.title);
    });

    $(".useLegs").click(function(){
        console.log("USE LEGS\n");
        //change src
        $("#botLegs").attr('src', "/assets/img/" + this.id);
        //change title
        $("#botLegs").attr('title', this.title);
    });

    $(".returnPart").click(function(){
        console.log("RETURN PART\n");
        //change src
        aja()
          .url('../assembly/returnPart')
          .on('success', function(){
          })
          .go();
        //change title
    });

    $(".buildBot").click(function(){
        console.log("BUILD BOT\n");
        //use parts
        //buildBot


    });
});
