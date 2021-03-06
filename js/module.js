M.search_courses = M.search_courses || {};

var matchesFound = "<div><a href='{courselink}'><b>{highlighted}</b> ({teacher_lastname} {teacher_firstname})</a></div>";

M.search_courses.init = function (Y, params) {

    YUI().use('autocomplete', 'autocomplete-highlighters', 'cookie', function (Y) {

        var InpNode = Y.one('#search_course_by_course_name');

	var InpNodeTeacher = Y.one('#search_course_by_teacher');


	InpNode.on('focus', function (e) {
        	M.search_courses.AutoCompletePlugin(Y, this, params);

    	});

	InpNodeTeacher.on('focus', function (e) {
        	M.search_courses.AutoCompletePlugin(Y, this, params);
    	});
    });
}

M.search_courses.AutoCompletePlugin = function (Y, node, params) {

    function course_Formatter(query, results) {

        return Y.Array.map(results, function (result) {
            var course = result.raw;
            var highlighted = result.highlighted;
            var courselink = M.cfg.wwwroot + '/course/view.php?id=' + course.id;
	        var teacher_lastname = result.raw.lastname;
    	    var teacher_firstname = result.raw.firstname;

            return Y.Lang.sub(matchesFound, {
                courselink: courselink,
                highlighted: highlighted,
		        teacher_lastname: teacher_lastname,
		        teacher_firstname: teacher_firstname
            });
        });

    }	
	var address;

	if( node == Y.one('#search_course_by_course_name') )
		address = M.cfg.wwwroot + '/blocks/searchunipicourses/result_by_course_name.php?query={query}';
	else
		address = M.cfg.wwwroot + '/blocks/searchunipicourses/result_by_teacher.php?query={query}';
	
    	node.plug(Y.Plugin.AutoComplete, {
        resultFormatter: course_Formatter,
        resultHighlighter: 'phraseMatch',
        resultListLocator: 'results',
        alwaysShowList: false,
        resultTextLocator: 'fullname',
        source: address
        })
}






