jQuery.getJSON('bird.json', function(bird) {
    var template = jQuery('#personTpl').html();
    var html = Mustache.to_html(template, bird);
    jQuery('#sampleArea').html(html);
});
