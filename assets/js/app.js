/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import * as am4plugins_wordCloud from "@amcharts/amcharts4/plugins/wordCloud";
import axios from "axios";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

let chart = am4core.create("tagsCloud", am4plugins_wordCloud.WordCloud);
let series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
series.randomness = 0.1;
series.rotationThreshold = 0.5;

series.dataFields.word = "word";
series.dataFields.value = "count";

series.heatRules.push({
    "target": series.labels.template,
    "property": "fill",
    "min": am4core.color("#0000CC"),
    "max": am4core.color("#CC00CC"),
    "dataField": "value"
});

series.labels.template.url = "{{ url('/tag-cloud') }}?word={word}"; //TODO: Generate real path
series.labels.template.urlTarget = "_blank";
series.labels.template.tooltipText = "{word}: {value}";

var hoverState = series.labels.template.states.create("hover");
hoverState.properties.fill = am4core.color("#FF0000");

var subtitle = chart.titles.create();
subtitle.text = "(click to open)";

var title = chart.titles.create();
title.text = "Most Popular Tags @ ODClient";
title.fontSize = 20;
title.fontWeight = "800";

let words = [];
axios.get('/tags-cloud').then(response => {
    words = response.data;
    series.data = words;
}).catch(error => console.log(error));

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
