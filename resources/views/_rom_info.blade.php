@section('rom-info')
<div class="col-md-6">
	<div>ALTTP Logic: <span class="logic"></span></div>
	<div>SM Logic: <span class="sm_logic"></span></div>
	<div>ROM build: <span class="build"></span></div>
	<div>Difficulty: <span class="difficulty"></span></div>
	<div>Variation: <span class="variation"></span></div>
	<div style="display:none">Shuffle: <span class="shuffle"></span></div>
	<div>Mode: <span class="mode"></span></div>
	<div style="display:none">Swords: <span class="weapons"></span></div>
	<div style="display:none">Morph: <span class="morph"></span></div>
	<div>Goal: <span class="goal"></span></div>
	<div>Seed: <span class="seed"></span></div>
	<div style="display:none">Special: <span class="special"></span></div>
	<div style="display:none">Notes: <span class="notes"></span></div>
</div>

<script>
function parseInfoFromPatch(patch) {
	$('.info').show();
	$('.info .seed').html(patch.seed + (patch.hash !== undefined ? " [<a href='/h/" + patch.hash + "'>permalink</a>]" : ''));
	if ($('input[name=tournament]').val() == 'true') {
		$('.info .seed').html("<a href='/h/" + patch.seed + "'>" + patch.seed + "</a>");
	}
	if (patch.seed == 'vanilla') {
		$('.info .seed').html('Vanilla');
	}
	if (patch.spoiler.meta.name) {
		$('.info .name').html(patch.spoiler.meta.name);
	}
	if (!patch.seed && patch.hash) {
		$('.info .seed').html(patch.hash);
	}
	$('.info .logic').html(patch.spoiler.meta.logic);
	$('.info .sm_logic').html(patch.spoiler.meta.sm_logic);
	$('.info .build').html(patch.spoiler.meta.build);
	$('.info .goal').html(patch.spoiler.meta.goal);
	$('.info .mode').html(patch.spoiler.meta.mode);
	if (patch.spoiler.meta.weapons) {
		$('.info .weapons').parent().show();
		$('.info .weapons').html(patch.spoiler.meta.weapons);
	} else {
		$('.info .weapons').parent().hide();
	}
	if (patch.spoiler.meta.morph) {
		$('.info .morph').parent().show();
		$('.info .morph').html(patch.spoiler.meta.morph);
	} else {
		$('.info .morph').parent().hide();
	}	
	$('.info .variation').html(patch.spoiler.meta.variation);
	if (patch.difficulty == 'custom') {
		$('.info .difficulty').html(patch.difficulty + ' (' + patch.spoiler.meta.difficulty_mode + ')');
	} else {
		$('.info .difficulty').html(patch.difficulty);
	}
	$('.info .shuffle').html(patch.spoiler.meta.shuffle);
	$('.info .special').html(patch.spoiler.meta.special);
	$('.info .notes').html(patch.spoiler.meta.notes);
	if (patch.spoiler.meta.shuffle) {
		$('.info .shuffle').parent().show();
	} else {
		$('.info .shuffle').parent().hide();
	}
	if (patch.spoiler.meta.special) {
		$('.info .special').parent().show();
	} else {
		$('.info .special').parent().hide();
	}
	if (patch.spoiler.meta.notes) {
		$('.info .notes').parent().show();
	} else {
		$('.info .notes').parent().hide();
	}
}
</script>
@overwrite
