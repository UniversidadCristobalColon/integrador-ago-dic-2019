$(document).ready(function () {
    $('#dtHorizontalVerticalExample').DataTable({
    "scrollX": true,
    "scrollY": 200,
    });
    $('.dataTables_length').addClass('bs-select');
    });

var users = [{"username":"apodbury0","first_name":"Alethea","middle_name":"Tanswill","last_name":"Podbury","email":"apodbury0@wiley.com","phone":"802-352-0243","department":"Legal","job":"Engineer IV","role":"Administrador"},
    {"username":"wallix1","first_name":"Weidar","middle_name":"Stiller","last_name":"Allix","email":"wallix1@twitpic.com","phone":"664-664-6184","department":"Marketing","job":"Environmental Tech","role":"Auxiliar"},
    {"username":"imaunder2","first_name":"Issi","middle_name":"Shovlar","last_name":"Maunder","email":"imaunder2@marriott.com","phone":"457-565-6381","department":"Business Development","job":"Programmer III","role":"Administrador"},
    {"username":"bvalenta3","first_name":"Barbee","middle_name":"Stores","last_name":"Valenta","email":"bvalenta3@ehow.com","phone":"421-560-5067","department":"Accounting","job":"Statistician II","role":"Encuestado"},
    {"username":"kmarushak4","first_name":"Kinna","middle_name":"Kachel","last_name":"Marushak","email":"kmarushak4@webeden.co.uk","phone":"790-193-2732","department":"Marketing","job":"Geological Engineer","role":"Encuestado"},
    {"username":"lritchley5","first_name":"Lydon","middle_name":"Kybbye","last_name":"Ritchley","email":"lritchley5@mapquest.com","phone":"205-330-9192","department":"Legal","job":"VP Accounting","role":"Auxiliar"},
    {"username":"msawrey6","first_name":"Maddy","middle_name":"Tidcombe","last_name":"Sawrey","email":"msawrey6@umich.edu","phone":"392-902-1537","department":"Human Resources","job":"Programmer Analyst III","role":"Encuestado"},
    {"username":"sstelli7","first_name":"Sean","middle_name":"Wreakes","last_name":"Stelli","email":"sstelli7@fda.gov","phone":"372-169-0847","department":"Marketing","job":"Developer I","role":"Encuestado"},
    {"username":"jbiner8","first_name":"Jenna","middle_name":"Shropshire","last_name":"Biner","email":"jbiner8@shop-pro.jp","phone":"416-622-7938","department":"Research and Development","job":"Biostatistician II","role":"Encuestado"},
    {"username":"sgregolotti9","first_name":"Salomone","middle_name":"Aherne","last_name":"Gregolotti","email":"sgregolotti9@apache.org","phone":"327-588-9101","department":"Research and Development","job":"Teacher","role":"Auxiliar"},
    {"username":"sgodilingtona","first_name":"Shannan","middle_name":"Doctor","last_name":"Godilington","email":"sgodilingtona@cocolog-nifty.com","phone":"304-488-5458","department":"Marketing","job":"Accountant III","role":"Auxiliar"},
    {"username":"kdowryb","first_name":"Keefer","middle_name":"McKeaney","last_name":"Dowry","email":"kdowryb@domainmarket.com","phone":"608-112-8358","department":"Support","job":"Marketing Manager","role":"Auxiliar"},
    {"username":"tpurcerc","first_name":"Tan","middle_name":"Wellard","last_name":"Purcer","email":"tpurcerc@kickstarter.com","phone":"141-319-7273","department":"Sales","job":"Librarian","role":"Administrador"},
    {"username":"mandreud","first_name":"Marci","middle_name":"Moorerud","last_name":"Andreu","email":"mandreud@google.it","phone":"768-807-8923","department":"Sales","job":"Accountant III","role":"Administrador"},
    {"username":"lbilese","first_name":"Lyon","middle_name":"Beddon","last_name":"Biles","email":"lbilese@un.org","phone":"333-696-6378","department":"Product Management","job":"Health Coach II","role":"Administrador"},
    {"username":"emillef","first_name":"Elvis","middle_name":"Keyte","last_name":"Mille","email":"emillef@trellian.com","phone":"535-723-1496","department":"Research and Development","job":"Administrative Officer","role":"Auxiliar"},
    {"username":"cmarshalleckg","first_name":"Conan","middle_name":"Castiblanco","last_name":"Marshalleck","email":"cmarshalleckg@github.com","phone":"396-579-3295","department":"Marketing","job":"Business Systems Development Analyst","role":"Auxiliar"},
    {"username":"jhevnerh","first_name":"Joshia","middle_name":"Murphy","last_name":"Hevner","email":"jhevnerh@reverbnation.com","phone":"377-664-3654","department":"Support","job":"Help Desk Operator","role":"Auxiliar"},
    {"username":"wmaccaddiei","first_name":"Waldo","middle_name":"Loveman","last_name":"Maccaddie","email":"wmaccaddiei@unesco.org","phone":"259-253-8327","department":"Human Resources","job":"Senior Developer","role":"Encuestado"},
    {"username":"avanderveldej","first_name":"Ange","middle_name":"Gethouse","last_name":"Van der Velde","email":"avanderveldej@usnews.com","phone":"436-718-5008","department":"Training","job":"Sales Associate","role":"Administrador"},
    {"username":"bdavagek","first_name":"Blake","middle_name":"D'Ugo","last_name":"Davage","email":"bdavagek@last.fm","phone":"469-585-2589","department":"Business Development","job":"Staff Scientist","role":"Administrador"},
    {"username":"lmaccallionl","first_name":"Leslie","middle_name":"Turbat","last_name":"MacCallion","email":"lmaccallionl@uol.com.br","phone":"311-731-4950","department":"Business Development","job":"Community Outreach Specialist","role":"Administrador"},
    {"username":"ailyasm","first_name":"Adair","middle_name":"Budibent","last_name":"Ilyas","email":"ailyasm@t.co","phone":"738-924-8340","department":"Training","job":"Registered Nurse","role":"Administrador"},
    {"username":"hmerilln","first_name":"Harmonia","middle_name":"Gadie","last_name":"Merill","email":"hmerilln@apache.org","phone":"264-859-7263","department":"Legal","job":"Human Resources Manager","role":"Encuestado"},
    {"username":"cpandeyo","first_name":"Christoper","middle_name":"Allan","last_name":"Pandey","email":"cpandeyo@vk.com","phone":"357-791-6940","department":"Research and Development","job":"Mechanical Systems Engineer","role":"Encuestado"},
    {"username":"mshillabearep","first_name":"Marillin","middle_name":"Leiden","last_name":"Shillabeare","email":"mshillabearep@adobe.com","phone":"137-500-7171","department":"Engineering","job":"Software Consultant","role":"Auxiliar"},
    {"username":"afieldenq","first_name":"Alex","middle_name":"Giacopini","last_name":"Fielden","email":"afieldenq@abc.net.au","phone":"315-112-2429","department":"Engineering","job":"Social Worker","role":"Administrador"},
    {"username":"mcleggr","first_name":"Mose","middle_name":"Dudek","last_name":"Clegg","email":"mcleggr@springer.com","phone":"853-556-8395","department":"Product Management","job":"Payment Adjustment Coordinator","role":"Administrador"},
    {"username":"wlabbets","first_name":"Willi","middle_name":"Stilgo","last_name":"LAbbet","email":"wlabbets@wired.com","phone":"957-755-5659","department":"Accounting","job":"Account Coordinator","role":"Encuestado"},
    {"username":"eduplant","first_name":"Eilis","middle_name":"Mulcock","last_name":"Duplan","email":"eduplant@constantcontact.com","phone":"791-163-9730","department":"Marketing","job":"VP Product Management","role":"Administrador"},
    {"username":"tblanchfloweru","first_name":"Talbert","middle_name":"Radbourn","last_name":"Blanchflower","email":"tblanchfloweru@webmd.com","phone":"385-177-8376","department":"Training","job":"Project Manager","role":"Administrador"},
    {"username":"dscotterv","first_name":"Dallon","middle_name":"Dugood","last_name":"Scotter","email":"dscotterv@dropbox.com","phone":"452-884-1681","department":"Research and Development","job":"Electrical Engineer","role":"Encuestado"},
    {"username":"hcharerw","first_name":"Hermione","middle_name":"Elsdon","last_name":"Charer","email":"hcharerw@time.com","phone":"153-944-4746","department":"Sales","job":"Software Test Engineer III","role":"Administrador"},
    {"username":"bolyffx","first_name":"Bourke","middle_name":"Prout","last_name":"Olyff","email":"bolyffx@squidoo.com","phone":"593-873-5939","department":"Product Management","job":"Food Chemist","role":"Auxiliar"},
    {"username":"lrolesy","first_name":"Les","middle_name":"Fellnee","last_name":"Roles","email":"lrolesy@people.com.cn","phone":"811-229-2627","department":"Human Resources","job":"Nuclear Power Engineer","role":"Auxiliar"},
    {"username":"croycez","first_name":"Carie","middle_name":"Crayton","last_name":"Royce","email":"croycez@newsvine.com","phone":"281-658-7478","department":"Business Development","job":"Recruiter","role":"Administrador"},
    {"username":"hambrosch10","first_name":"Harrietta","middle_name":"Bere","last_name":"Ambrosch","email":"hambrosch10@1und1.de","phone":"616-844-1448","department":"Support","job":"Financial Analyst","role":"Encuestado"},
    {"username":"ryellowlees11","first_name":"Ronald","middle_name":"Sterricks","last_name":"Yellowlees","email":"ryellowlees11@shareasale.com","phone":"141-155-2050","department":"Product Management","job":"Nurse Practicioner","role":"Auxiliar"},
    {"username":"stembey12","first_name":"Sherline","middle_name":"Nisco","last_name":"Tembey","email":"stembey12@washington.edu","phone":"561-389-5148","department":"Business Development","job":"Health Coach II","role":"Encuestado"},
    {"username":"schipping13","first_name":"Seline","middle_name":"Crab","last_name":"Chipping","email":"schipping13@oakley.com","phone":"435-163-1124","department":"Research and Development","job":"Senior Sales Associate","role":"Encuestado"},
    {"username":"rdeport14","first_name":"Reeva","middle_name":"Sheals","last_name":"Deport","email":"rdeport14@theatlantic.com","phone":"162-238-6795","department":"Accounting","job":"Statistician III","role":"Administrador"},
    {"username":"jtimms15","first_name":"Jewell","middle_name":"Laidlaw","last_name":"Timms","email":"jtimms15@seattletimes.com","phone":"797-305-3252","department":"Product Management","job":"Cost Accountant","role":"Encuestado"},
    {"username":"wbortoluzzi16","first_name":"Willy","middle_name":"Wreiford","last_name":"Bortoluzzi","email":"wbortoluzzi16@youtu.be","phone":"444-565-8407","department":"Business Development","job":"Sales Representative","role":"Auxiliar"},
    {"username":"plangtry17","first_name":"Pia","middle_name":"Aggiss","last_name":"Langtry","email":"plangtry17@icq.com","phone":"786-171-8379","department":"Support","job":"Project Manager","role":"Administrador"},
    {"username":"gcheasman18","first_name":"Giacinta","middle_name":"Aiton","last_name":"Cheasman","email":"gcheasman18@aol.com","phone":"554-425-3483","department":"Services","job":"Safety Technician I","role":"Auxiliar"},
    {"username":"jquerree19","first_name":"Jemima","middle_name":"Howden","last_name":"Querree","email":"jquerree19@jalbum.net","phone":"916-457-2018","department":"Support","job":"Financial Advisor","role":"Auxiliar"},
    {"username":"lgodden1a","first_name":"Lorettalorna","middle_name":"Bogeys","last_name":"Godden","email":"lgodden1a@europa.eu","phone":"270-573-0028","department":"Business Development","job":"Safety Technician III","role":"Administrador"},
    {"username":"hwatchorn1b","first_name":"Harwilll","middle_name":"Vasic","last_name":"Watchorn","email":"hwatchorn1b@businesswire.com","phone":"477-370-6528","department":"Research and Development","job":"Nuclear Power Engineer","role":"Administrador"},
    {"username":"acayford1c","first_name":"Annabel","middle_name":"MacDougall","last_name":"Cayford","email":"acayford1c@virginia.edu","phone":"977-528-4879","department":"Engineering","job":"Engineer III","role":"Encuestado"},
    {"username":"mmcmanamen1d","first_name":"Malva","middle_name":"Edgeller","last_name":"McManamen","email":"mmcmanamen1d@howstuffworks.com","phone":"659-709-4116","department":"Research and Development","job":"Human Resources Assistant IV","role":"Encuestado"},
    {"username":"hdowner1e","first_name":"Hubert","middle_name":"Harradine","last_name":"Downer","email":"hdowner1e@howstuffworks.com","phone":"558-215-9418","department":"Research and Development","job":"Computer Systems Analyst II","role":"Encuestado"},
    {"username":"eshireff1f","first_name":"Edlin","middle_name":"Escale","last_name":"Shireff","email":"eshireff1f@seesaa.net","phone":"378-137-8967","department":"Business Development","job":"Research Assistant I","role":"Auxiliar"},
    {"username":"jayars1g","first_name":"Judie","middle_name":"Lomen","last_name":"Ayars","email":"jayars1g@rambler.ru","phone":"480-321-2747","department":"Accounting","job":"Administrative Assistant IV","role":"Administrador"},
    {"username":"rwince1h","first_name":"Rosmunda","middle_name":"Andrelli","last_name":"Wince","email":"rwince1h@ebay.com","phone":"365-216-2803","department":"Product Management","job":"Senior Sales Associate","role":"Auxiliar"},
    {"username":"pmcgarrity1i","first_name":"Pace","middle_name":"Dundredge","last_name":"McGarrity","email":"pmcgarrity1i@gizmodo.com","phone":"524-734-1373","department":"Marketing","job":"Graphic Designer","role":"Administrador"},
    {"username":"bminmagh1j","first_name":"Budd","middle_name":"Wiltshire","last_name":"Minmagh","email":"bminmagh1j@pcworld.com","phone":"349-989-4865","department":"Engineering","job":"Structural Engineer","role":"Administrador"},
    {"username":"lwylder1k","first_name":"Lanita","middle_name":"Mosco","last_name":"Wylder","email":"lwylder1k@woothemes.com","phone":"346-330-5939","department":"Business Development","job":"Structural Analysis Engineer","role":"Encuestado"},
    {"username":"ediggell1l","first_name":"Ellyn","middle_name":"Moralas","last_name":"Diggell","email":"ediggell1l@indiegogo.com","phone":"320-736-0636","department":"Legal","job":"Senior Financial Analyst","role":"Encuestado"},
    {"username":"cloxston1m","first_name":"Conant","middle_name":"Rubinivitz","last_name":"Loxston","email":"cloxston1m@example.com","phone":"490-585-5977","department":"Research and Development","job":"Budget/Accounting Analyst II","role":"Administrador"},
    {"username":"hmaevela1n","first_name":"Hersch","middle_name":"Arnatt","last_name":"Maevela","email":"hmaevela1n@dagondesign.com","phone":"912-274-3593","department":"Research and Development","job":"Assistant Professor","role":"Encuestado"},
    {"username":"astirzaker1o","first_name":"Andy","middle_name":"Ickovic","last_name":"Stirzaker","email":"astirzaker1o@squidoo.com","phone":"705-964-9791","department":"Marketing","job":"Statistician IV","role":"Auxiliar"},
    {"username":"aboakes1p","first_name":"Amory","middle_name":"Lysons","last_name":"Boakes","email":"aboakes1p@yelp.com","phone":"684-707-8400","department":"Research and Development","job":"Programmer Analyst III","role":"Encuestado"},
    {"username":"rpesterfield1q","first_name":"Ronni","middle_name":"Dray","last_name":"Pesterfield","email":"rpesterfield1q@rediff.com","phone":"322-246-2541","department":"Human Resources","job":"VP Product Management","role":"Auxiliar"},
    {"username":"sfreckleton1r","first_name":"Shannen","middle_name":"Sharratt","last_name":"Freckleton","email":"sfreckleton1r@paginegialle.it","phone":"597-351-5292","department":"Services","job":"Nurse Practicioner","role":"Encuestado"},
    {"username":"arottcher1s","first_name":"Almeria","middle_name":"Calvard","last_name":"Rottcher","email":"arottcher1s@arizona.edu","phone":"916-674-1132","department":"Services","job":"Structural Engineer","role":"Administrador"},
    {"username":"rtwidale1t","first_name":"Ricardo","middle_name":"Garwill","last_name":"Twidale","email":"rtwidale1t@google.de","phone":"520-634-5489","department":"Legal","job":"Health Coach II","role":"Auxiliar"},
    {"username":"korae1u","first_name":"Karil","middle_name":"McCosh","last_name":"Orae","email":"korae1u@cnet.com","phone":"888-779-6549","department":"Marketing","job":"Tax Accountant","role":"Administrador"},
    {"username":"kmiquelet1v","first_name":"Kathie","middle_name":"Embling","last_name":"Miquelet","email":"kmiquelet1v@icio.us","phone":"941-700-4071","department":"Product Management","job":"Financial Analyst","role":"Administrador"},
    {"username":"mhammerich1w","first_name":"Marys","middle_name":"Kippling","last_name":"Hammerich","email":"mhammerich1w@thetimes.co.uk","phone":"638-239-6980","department":"Training","job":"Web Developer II","role":"Auxiliar"},
    {"username":"emurfin1x","first_name":"Elwyn","middle_name":"Westpfel","last_name":"Murfin","email":"emurfin1x@nih.gov","phone":"376-745-1666","department":"Research and Development","job":"Actuary","role":"Encuestado"},
    {"username":"atrewin1y","first_name":"Alia","middle_name":"Soppitt","last_name":"Trewin","email":"atrewin1y@ftc.gov","phone":"650-118-8501","department":"Support","job":"Senior Editor","role":"Administrador"},
    {"username":"fcanter1z","first_name":"Felicle","middle_name":"Sparry","last_name":"Canter","email":"fcanter1z@yahoo.co.jp","phone":"661-317-2862","department":"Legal","job":"Research Nurse","role":"Auxiliar"},
    {"username":"clishmund20","first_name":"Chrysa","middle_name":"Chatel","last_name":"Lishmund","email":"clishmund20@fc2.com","phone":"386-584-9363","department":"Product Management","job":"Account Executive","role":"Encuestado"},
    {"username":"gcocklin21","first_name":"Grantley","middle_name":"Casajuana","last_name":"Cocklin","email":"gcocklin21@xing.com","phone":"799-392-2490","department":"Training","job":"Technical Writer","role":"Administrador"},
    {"username":"eadolthine22","first_name":"Eleonore","middle_name":"McCunn","last_name":"Adolthine","email":"eadolthine22@imdb.com","phone":"784-481-0841","department":"Legal","job":"Operator","role":"Auxiliar"},
    {"username":"lcoppenhall23","first_name":"Linnea","middle_name":"Surmeyers","last_name":"Coppenhall","email":"lcoppenhall23@yandex.ru","phone":"408-731-5250","department":"Product Management","job":"Research Assistant III","role":"Administrador"},
    {"username":"dbosche24","first_name":"Diandra","middle_name":"Connow","last_name":"Bosche","email":"dbosche24@mashable.com","phone":"376-892-2253","department":"Business Development","job":"Safety Technician I","role":"Encuestado"},
    {"username":"kgudde25","first_name":"Kinna","middle_name":"Braghini","last_name":"Gudde","email":"kgudde25@icq.com","phone":"199-479-1686","department":"Training","job":"Pharmacist","role":"Auxiliar"},
    {"username":"bkramer26","first_name":"Babette","middle_name":"Phythien","last_name":"Kramer","email":"bkramer26@cloudflare.com","phone":"155-426-7129","department":"Engineering","job":"General Manager","role":"Encuestado"},
    {"username":"chemeret27","first_name":"Cletis","middle_name":"Blight","last_name":"Hemeret","email":"chemeret27@networkadvertising.org","phone":"334-429-1070","department":"Research and Development","job":"Office Assistant IV","role":"Auxiliar"},
    {"username":"atowhey28","first_name":"Ameline","middle_name":"Pinchin","last_name":"Towhey","email":"atowhey28@apple.com","phone":"139-976-2926","department":"Services","job":"Environmental Specialist","role":"Encuestado"},
    {"username":"tcowthard29","first_name":"Torrie","middle_name":"Gaspero","last_name":"Cowthard","email":"tcowthard29@rediff.com","phone":"100-116-1789","department":"Marketing","job":"Marketing Manager","role":"Administrador"},
    {"username":"icosgry2a","first_name":"Irvin","middle_name":"Week","last_name":"Cosgry","email":"icosgry2a@issuu.com","phone":"817-603-1985","department":"Support","job":"Paralegal","role":"Administrador"},
    {"username":"msylvester2b","first_name":"Maxwell","middle_name":"Goane","last_name":"Sylvester","email":"msylvester2b@blinklist.com","phone":"209-294-7259","department":"Business Development","job":"Budget/Accounting Analyst III","role":"Administrador"},
    {"username":"msnelgar2c","first_name":"May","middle_name":"Bleakley","last_name":"Snelgar","email":"msnelgar2c@virginia.edu","phone":"586-186-2062","department":"Marketing","job":"Senior Editor","role":"Encuestado"},
    {"username":"gyankishin2d","first_name":"Geneva","middle_name":"Bilby","last_name":"Yankishin","email":"gyankishin2d@blinklist.com","phone":"362-512-0061","department":"Human Resources","job":"Quality Engineer","role":"Auxiliar"},
    {"username":"mreece2e","first_name":"Myrah","middle_name":"Anthony","last_name":"Reece","email":"mreece2e@cnn.com","phone":"921-267-5403","department":"Training","job":"Clinical Specialist","role":"Administrador"},
    {"username":"itoy2f","first_name":"Ibby","middle_name":"Juorio","last_name":"Toy","email":"itoy2f@uiuc.edu","phone":"574-422-4601","department":"Accounting","job":"Analyst Programmer","role":"Auxiliar"},
    {"username":"fminchella2g","first_name":"Filberto","middle_name":"Kinnin","last_name":"Minchella","email":"fminchella2g@fema.gov","phone":"481-226-1845","department":"Sales","job":"Web Developer II","role":"Auxiliar"},
    {"username":"ctitchard2h","first_name":"Carolus","middle_name":"Aizikovitz","last_name":"Titchard","email":"ctitchard2h@smh.com.au","phone":"360-624-3889","department":"Product Management","job":"Physical Therapy Assistant","role":"Administrador"},
    {"username":"bduling2i","first_name":"Beatrix","middle_name":"Bulcock","last_name":"Duling","email":"bduling2i@mozilla.org","phone":"224-119-7225","department":"Services","job":"Product Engineer","role":"Auxiliar"},
    {"username":"dbridle2j","first_name":"Doroteya","middle_name":"Flaonier","last_name":"Bridle","email":"dbridle2j@ca.gov","phone":"832-672-9015","department":"Services","job":"Statistician I","role":"Encuestado"},
    {"username":"dtaplin2k","first_name":"Doloritas","middle_name":"Redsell","last_name":"Taplin","email":"dtaplin2k@vistaprint.com","phone":"803-590-2016","department":"Support","job":"Structural Engineer","role":"Auxiliar"},
    {"username":"raleshkov2l","first_name":"Roxana","middle_name":"McIllrick","last_name":"Aleshkov","email":"raleshkov2l@weather.com","phone":"817-537-3734","department":"Support","job":"Analog Circuit Design manager","role":"Encuestado"},
    {"username":"rpaffot2m","first_name":"Reidar","middle_name":"Cocci","last_name":"Paffot","email":"rpaffot2m@paypal.com","phone":"470-948-9265","department":"Product Management","job":"Administrative Officer","role":"Auxiliar"},
    {"username":"ctapenden2n","first_name":"Celesta","middle_name":"Fowlie","last_name":"Tapenden","email":"ctapenden2n@dmoz.org","phone":"999-739-0666","department":"Product Management","job":"Administrative Officer","role":"Auxiliar"},
    {"username":"lsteggals2o","first_name":"Linell","middle_name":"Egre","last_name":"Steggals","email":"lsteggals2o@1688.com","phone":"558-702-5185","department":"Accounting","job":"Professor","role":"Administrador"},
    {"username":"mchaise2p","first_name":"Merill","middle_name":"Steffens","last_name":"Chaise","email":"mchaise2p@desdev.cn","phone":"738-961-7584","department":"Legal","job":"Account Executive","role":"Encuestado"},
    {"username":"svanderweedenburg2q","first_name":"Salaidh","middle_name":"Shearmur","last_name":"Van Der Weedenburg","email":"svanderweedenburg2q@google.ca","phone":"148-365-5710","department":"Training","job":"Staff Scientist","role":"Encuestado"},
    {"username":"mgolda2r","first_name":"Malvin","middle_name":"Skyme","last_name":"Golda","email":"mgolda2r@illinois.edu","phone":"348-210-5891","department":"Human Resources","job":"Mechanical Systems Engineer","role":"Auxiliar"}];

let usersDummy = (document.querySelector("#dataTable tbody"));
for(let i = 0; i < users.length; i ++){
    let row = document.createElement("tr");
    let usr = document.createElement("td");
        usr.textContent = users[i].username;
    let fnm = document.createElement("td");
        fnm.textContent = users[i].first_name;
    let mnm = document.createElement("td");
        mnm.textContent = users[i].middle_name;
    let lnm = document.createElement("td");
        lnm.textContent = users[i].last_name;
    let email = document.createElement("td");
        email.textContent = users[i].email;
    let phn = document.createElement("td");
        phn.textContent = Date(Date.now()).toString();
    let dpt = document.createElement("td");
        dpt.textContent = users[i].department;
    let job = document.createElement("td");
        job.textContent = users[i].job;
    let role = document.createElement("td");
        role.textContent = new Date("2019-11-12");
    let actions = document.createElement("td");
    actions.setAttribute("class", "text-center");
    let edit = document.createElement("i");
        edit.setAttribute("class", "far fa-edit text-center mx-auto");
        console.log(edit);
    let remove = document.createElement("i");
        remove.setAttribute("class", "far fa-trash-alt text-center mx-auto");
    actions.appendChild(edit);
    actions.appendChild(remove);

    row.appendChild(usr);
    row.appendChild(fnm);
    row.appendChild(mnm);
    row.appendChild(lnm);
    row.appendChild(email);
    row.appendChild(dpt);
    row.appendChild(job);
    row.appendChild(role);
    row.appendChild(phn);
    row.appendChild(actions);


    usersDummy.appendChild(row);
}