$.getJSON('bird.json', function(bird) {
  var template = $('#personTpl').html();
  var compiled = Handlebars.compile(template)
  var html = compiled(bird)
  $('#sampleArea').html(html);
});
