
/**
 * Creates range input elements for voteForm, and submitVote forms.
 */
function getEmo(element) {

	element.append(
			$("<h1>").text("Joy."),
			$("<input>", {
				type: 'range',
				name: 'joy',
				min: '0',
				max: '6',
				id: 'Joy',
			}), $("<h1>").text("Trust."),
			$("<input>", {
				type: 'range',
				name: 'trust',
				min: '0',
				max: '6',
				id: 'Trust',
			}), $("<h1>").text("Fear."),
			$("<input>", {
				type: 'range',
				name: 'fear',
				min: '0',
				max: '6',
				id: 'Fear',
			}), $("<h1>").text("Surprise."),
			$("<input>", {
				type: 'range',
				name: 'surprise',
				min: '0',
				max: '6',
				id: 'Surprise',
			}), $("<h1>").text("Sadness."),
			$("<input>", {
				type: 'range',
				name: 'sadness',
				min: '0',
				max: '6',
				id: 'Sadness',
			}), $("<h1>").text("Disgust."),
			$("<input>", {
				type: 'range',
				name: 'disgust',
				min: '0',
				max: '6',
				id: 'Disgust',
			}), $("<h1>").text("Anger."),
			$("<input>", {
				type: 'range',
				name: 'anger',
				min: '0',
				max: '6',
				id: 'Anger'
			}), $("<h1>").text("Anticipation."),
			$("<input>", {
				type: 'range',
				name: 'anticipation',
				min: '0',
				max: '6',
				id: 'Anticipation',

			})

	);
	$( "#Joy" ).data( "spect", { e1: "Mild Serenity", e2: "Serenity", e3 : "Mild Joy", e4: "Joy", e5: "Strong Joy",e6: "Ecstasy" } );
	$( "#Trust" ).data( "spect", { e1: "Mild Acceptance", e2: "Acceptance", e3 : "Mild Trust", e4: "Trust", e5: "Strong Trust",e6: "Admiration" } );
	$( "#Fear" ).data( "spect", { e1: "Mild Apprehension", e2: "Apprehension", e3 : "Mild Fear", e4: "Fear", e5: "Strong Fear",e6: "Terror" } );
	$( "#Surprise" ).data( "spect", { e1: "Mild Distraction", e2: "Distraction", e3 : "Mild Surprise", e4: "Surprise", e5: "Strong Surprise",e6: "Amazement" } );
	$( "#Sadness" ).data( "spect", { e1: "Mild Pensiveness", e2: "Pensiveness", e3 : "Mild Sadness", e4: "Sadness", e5: "Strong Sadness",e6: "Grief" } );
	$( "#Disgust" ).data( "spect", { e1: "Mild Boredom", e2: "Boredom", e3 : "Mild Disgust", e4: "Disgust", e5: "Strong Disgust",e6: "Loathing" } );
	$( "#Anger" ).data( "spect", { e1: "Mild Annoyance", e2: "Annoyance", e3 : "Mild Anger", e4: "Anger", e5: "Strong Anger",e6: "Rage" } );
	$( "#Anticipation" ).data( "spect", { e1: "Mild Interest", e2: "Interest", e3 : "Mild Anticipation", e4: "Anticipation", e5: "Strong Anticipation",e6: "Vigilance" } );

}

