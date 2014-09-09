$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTab a[href="#Novosib"]').tab('show') // Select tab by name