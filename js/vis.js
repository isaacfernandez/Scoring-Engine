// This function generates our table based on the following data object
// "data" should be a json object structured as follows
// data.tests   - an array of strings, each string the name of a test. This will
//                translate into our header row.
// data.servers - an array of json objects, each object having an attribute for
//                each test and an attribute, data.servers[x].name, for the 
//                name to be displayed for each server (ie. our header column)

function serviceStatusInit(data) {
	table = d3.select("#status_table");

	thead = table.append("thead").append("tr");
	thead.selectAll("th").data([""].concat(data.tests)).enter()
		.append("th")
		.text(function(d) { return d; });

	tbody = table.append("tbody");
	
	serviceStatus(data);
}

// This function updates the service status tables based on the data object 
// passed to it.
function serviceStatus(data) {
	tbody = d3.select("#status_table").select("tbody");

	trows = tbody.selectAll("tr").data(data.servers);
	tr = trows.enter().append("tr");

        tcells = trows.selectAll("td").data(function(d) {
                        return ["name"].concat(data.tests).map(function(k) { return d[k] });
                });
	tcells.enter().append("td");
	tcells.text(function(d) { return d });

	trows.exit().remove();
	tcells.exit().remove();
}
