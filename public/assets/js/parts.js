function build() {
aja()
  .url('/parts/build')
  .on('success', function(data){
      alert(data['msg']);
  })
  .go();
}

function buy() {
aja()
  .url('/parts/buy')
  .on('success', function(data){
      alert(data['msg']);
  })
  .go();
}
