$(document).ready(function() {

	$("#dbPediaInput").on("keyup", function() {
		var replacedString = replaceAll($("#dbPediaInput").val(), " ", "_");
		$("#dbpedia_urlInput").val("https://dbpedia.org/resource/"+replacedString);
		//$("#dbpedia_urlInput").val("https://dbpedia.org/resource/"+$("#dbPediaInput").val().replace(" ", "_"));
		if ($("#dbPediaInput").val() == "") {
			$("#dbpedia_urlInput").val("");
		}
	});
	
});

function replaceAll(str, find, replace) {
  return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

function escapeRegExp(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // $& means the whole matched string
}