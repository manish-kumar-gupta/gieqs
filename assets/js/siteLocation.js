switch (true) {
	case winLocation('gieqs.com'):

		var rootFolder = 'http://www.gieqs.com';
		break;
	case winLocation('localhost'):
		var rootFolder = 'http://localhost:90/dashboard/gieqs';
		break;
	default: // set whatever you want
		var rootFolder = 'http://www.gieqs.com';
		break;
}



    var siteRoot = rootFolder;