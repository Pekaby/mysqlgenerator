
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_creator` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('1', '1', '922', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praeclare enim Plato: Beatum, cui etiam in senectute contigerit, ut sapientiam verasque opiniones assequi possit. Verum hoc idem saepe faciamus. Verba tu fingas et ea dicas, quae non sentias? Dol', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praeclare enim Plato: Beatum, cui etiam in senectute contigerit, ut sapientiam verasque opiniones assequi possit. Verum hoc idem saepe faciamus. Verba tu fingas et ea dicas, quae non sentias? Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Duo Reges: constructio interrete. At miser, si in flagitiosa et vitiosa vita afflueret voluptatibus. 

Potius inflammat, ut coercendi magis quam dedocendi esse videantur. Quae sequuntur igitur? Duae sunt enim res quoque, ne tu verba solum putes. Ne amores quidem sanctos a sapiente alienos esse arbitrantur. Si quicquam extra virtutem habeatur in bonis. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Philosophi autem in suis lectulis plerumque moriuntur. 

In qua quid est boni praeter summam voluptatem, et eam sempiternam? Si quicquam extra virtutem habeatur in bonis. Superiores tres erant, quae esse possent, quarum est una sola defensa, eaque vehementer. Non autem hoc: igitur ne illud quidem. Itaque si aut requietem natura non quaereret aut eam posset alia quadam ratione consequi. Ut proverbia non nulla veriora sint quam vestra dogmata. Cur iustitia laudatur? Perturbationes autem nulla naturae vi commoventur, omniaque ea sunt opiniones ac iudicia levitatis. Duo enim genera quae erant, fecit tria. At ille non pertimuit saneque fidenter: Istis quidem ipsis verbis, inquit; Prave, nequiter, turpiter cenabat; Somnum denique nobis, nisi requietem corporibus et is medicinam quandam laboris afferret, contra naturam putaremus datum; 

Inscite autem medicinae et gubernationis ultimum cum ultimo sapientiae comparatur. An dolor longissimus quisque miserrimus, voluptatem non optabiliorem diuturnitas facit? Vadem te ad mortem tyranno dabis pro amico, ut Pythagoreus ille Siculo fecit tyranno? Dolere malum est: in crucem qui agitur, beatus esse non potest. Quare hoc videndum est, possitne nobis hoc ratio philosophorum dare. Sed tamen est aliquid, quod nobis non liceat, liceat illis. 

', '101164');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('2', '15', '426', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quae hic rei publicae vulnera inponebat, eadem ille sanabat. Quaero igitur, quo modo hae tantae commendationes a natura profectae subito a sapientia relictae sint. Nulla profecto est, quin suam v', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quae hic rei publicae vulnera inponebat, eadem ille sanabat. Quaero igitur, quo modo hae tantae commendationes a natura profectae subito a sapientia relictae sint. Nulla profecto est, quin suam vim retineat a primo ad extremum. Hanc quoque iucunditatem, si vis, transfer in animum; 

Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Duo Reges: constructio interrete. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Non est ista, inquam, Piso, magna dissensio. Urgent tamen et nihil remittunt. 

Tu vero, inquam, ducas licet, si sequetur; Ex quo, id quod omnes expetunt, beate vivendi ratio inveniri et comparari potest. Nosti, credo, illud: Nemo pius est, qui pietatem-; Ut alios omittam, hunc appello, quem ille unum secutus est. Nam si beatus umquam fuisset, beatam vitam usque ad illum a Cyro extructum rogum pertulisset. Non est ista, inquam, Piso, magna dissensio. Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur. Sit hoc ultimum bonorum, quod nunc a me defenditur; 

An me, inquam, nisi te audire vellem, censes haec dicturum fuisse? Cum ageremus, inquit, vitae beatum et eundem supremum diem, scribebamus haec. Et hercule-fatendum est enim, quod sentio -mirabilis est apud illos contextus rerum. Nonne videmus quanta perturbatio rerum omnium consequatur, quanta confusio? Duarum enim vitarum nobis erunt instituta capienda. Istam voluptatem perpetuam quis potest praestare sapienti? Apud ceteros autem philosophos, qui quaesivit aliquid, tacet; Si ista mala sunt, in quae potest incidere sapiens, sapientem esse non esse ad beate vivendum satis. Cur igitur easdem res, inquam, Peripateticis dicentibus verbum nullum est, quod non intellegatur? Ex rebus enim timiditas, non ex vocabulis nascitur. 

', '177852');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('3', '25', '73', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid enim tanto opus est instrumento in optimis artibus comparandis? Itaque hic ipse iam pridem est reiectus; Efficiens dici potest. At iste non dolendi status non vocatur voluptas. 

Sapi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid enim tanto opus est instrumento in optimis artibus comparandis? Itaque hic ipse iam pridem est reiectus; Efficiens dici potest. At iste non dolendi status non vocatur voluptas. 

Sapientem locupletat ipsa natura, cuius divitias Epicurus parabiles esse docuit. Iam in altera philosophiae parte. Estne, quaeso, inquam, sitienti in bibendo voluptas? Utram tandem linguam nescio? Cum audissem Antiochum, Brute, ut solebam, cum M. Laelius clamores sofòw ille so lebat Edere compellans gumias ex ordine nostros. Nunc dicam de voluptate, nihil scilicet novi, ea tamen, quae te ipsum probaturum esse confidam. Apparet statim, quae sint officia, quae actiones. Inde sermone vario sex illa a Dipylo stadia confecimus. Inde igitur, inquit, ordiendum est. 

Non modo carum sibi quemque, verum etiam vehementer carum esse? Duo Reges: constructio interrete. Erit enim mecum, si tecum erit. Quo plebiscito decreta a senatu est consuli quaestio Cn. Omnes enim iucundum motum, quo sensus hilaretur. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Negat esse eam, inquit, propter se expetendam. Quo studio Aristophanem putamus aetatem in litteris duxisse? 

Quis non odit sordidos, vanos, leves, futtiles? Quid, quod homines infima fortuna, nulla spe rerum gerendarum, opifices denique delectantur historia? 

', '411383');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('4', '15', '208', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid, si non sensus modo ei sit datus, verum etiam animus hominis? Duo Reges: constructio interrete. Sed tu istuc dixti bene Latine, parum plane. Nihil opus est exemplis hoc facere longius. Porte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid, si non sensus modo ei sit datus, verum etiam animus hominis? Duo Reges: constructio interrete. Sed tu istuc dixti bene Latine, parum plane. Nihil opus est exemplis hoc facere longius. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Et nemo nimium beatus est; Ac ne plura complectar-sunt enim innumerabilia-, bene laudata virtus voluptatis aditus intercludat necesse est. Non minor, inquit, voluptas percipitur ex vilissimis rebus quam ex pretiosissimis. Servari enim iustitia nisi a forti viro, nisi a sapiente non potest. Quorum sine causa fieri nihil putandum est. Primum quid tu dicis breve? Sed quid minus probandum quam esse aliquem beatum nec satis beatum? 

Hunc vos beatum; Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Claudii libidini, qui tum erat summo ne imperio, dederetur. Quid enim ab antiquis ex eo genere, quod ad disserendum valet, praetermissum est? Et homini, qui ceteris animantibus plurimum praestat, praecipue a natura nihil datum esse dicemus? Cum autem negant ea quicquam ad beatam vitam pertinere, rursus naturam relinquunt. Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Potius inflammat, ut coercendi magis quam dedocendi esse videantur. 

Sic enim censent, oportunitatis esse beate vivere. Itaque a sapientia praecipitur se ipsam, si usus sit, sapiens ut relinquat. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Quid in isto egregio tuo officio et tanta fide-sic enim existimo-ad corpus refers? Quae animi affectio suum cuique tribuens atque hanc, quam dico. 

Potius inflammat, ut coercendi magis quam dedocendi esse videantur. Tum ille: Ain tandem? Deinde prima illa, quae in congressu solemus: Quid tu, inquit, huc? Praeteritis, inquit, gaudeo. Zenonis est, inquam, hoc Stoici. Atque hoc loco similitudines eas, quibus illi uti solent, dissimillimas proferebas. Itaque hic ipse iam pridem est reiectus; Ut in voluptate sit, qui epuletur, in dolore, qui torqueatur. 

', '145767');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('5', '8', '87', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Beatus autem esse in maximarum rerum timore nemo potest. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Quod cum accidisset ut alter alterum necopinat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Beatus autem esse in maximarum rerum timore nemo potest. Fortitudinis quaedam praecepta sunt ac paene leges, quae effeminari virum vetant in dolore. Quod cum accidisset ut alter alterum necopinato videremus, surrexit statim. Dolere malum est: in crucem qui agitur, beatus esse non potest. 

Re mihi non aeque satisfacit, et quidem locis pluribus. Sed quid ages tandem, si utilitas ab amicitia, ut fit saepe, defecerit? Duo Reges: constructio interrete. Vestri haec verecundius, illi fortasse constantius. Quis, quaeso, illum negat et bonum virum et comem et humanum fuisse? Si quicquam extra virtutem habeatur in bonis. Quamvis enim depravatae non sint, pravae tamen esse possunt. Quid ergo aliud intellegetur nisi uti ne quae pars naturae neglegatur? 

Simul atque natum animal est, gaudet voluptate et eam appetit ut bonum, aspernatur dolorem ut malum. Quid iudicant sensus? Non minor, inquit, voluptas percipitur ex vilissimis rebus quam ex pretiosissimis. Inde sermone vario sex illa a Dipylo stadia confecimus. Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. Venit enim mihi Platonis in mentem, quem accepimus primum hic disputare solitum; Sed residamus, inquit, si placet. 

Quod quidem iam fit etiam in Academia. Isto modo ne improbos quidem, si essent boni viri. Vitiosum est enim in dividendo partem in genere numerare. Non autem hoc: igitur ne illud quidem. Atque haec ita iustitiae propria sunt, ut sint virtutum reliquarum communia. Quia dolori non voluptas contraria est, sed doloris privatio. Quid in isto egregio tuo officio et tanta fide-sic enim existimo-ad corpus refers? 

', '206762');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('6', '18', '471', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quibus doctissimi illi veteres inesse quiddam caeleste et divinum putaverunt. Indicant pueri, in quibus ut in speculis natura cernitur. Verum hoc idem saepe faciamus. Duo Reges: constructio in', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quibus doctissimi illi veteres inesse quiddam caeleste et divinum putaverunt. Indicant pueri, in quibus ut in speculis natura cernitur. Verum hoc idem saepe faciamus. Duo Reges: constructio interrete. Nulla profecto est, quin suam vim retineat a primo ad extremum. Duae sunt enim res quoque, ne tu verba solum putes. 

Cum sciret confestim esse moriendum eamque mortem ardentiore studio peteret, quam Epicurus voluptatem petendam putat. Quid in isto egregio tuo officio et tanta fide-sic enim existimo-ad corpus refers? Recte, inquit, intellegis. At quanta conantur! Mundum hunc omnem oppidum esse nostrum! Incendi igitur eos, qui audiunt, vides. Stoicos roga. Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; 

Atqui reperies, inquit, in hoc quidem pertinacem; Si verbum sequimur, primum longius verbum praepositum quam bonum. Ad eas enim res ab Epicuro praecepta dantur. Quod dicit Epicurus etiam de voluptate, quae minime sint voluptates, eas obscurari saepe et obrui. Quis animo aequo videt eum, quem inpure ac flagitiose putet vivere? Ut placet, inquit, etsi enim illud erat aptius, aequum cuique concedere. Ac tamen, ne cui loco non videatur esse responsum, pauca etiam nunc dicam ad reliquam orationem tuam. 

Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum. Quis, quaeso, illum negat et bonum virum et comem et humanum fuisse? Philosophi autem in suis lectulis plerumque moriuntur. Itaque quantum adiit periculum! ad honestatem enim illum omnem conatum suum referebat, non ad voluptatem. 

', '320756');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('7', '4', '386', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Et hercule-fatendum est enim, quod sentio -mirabilis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Et hercule-fatendum est enim, quod sentio -mirabilis est apud illos contextus rerum. Nec enim, omnes avaritias si aeque avaritias esse dixerimus, sequetur ut etiam aequas esse dicamus. 

Et quidem illud ipsum non nimium probo et tantum patior, philosophum loqui de cupiditatibus finiendis. Illum mallem levares, quo optimum atque humanissimum virum, Cn. Tum Quintus: Est plane, Piso, ut dicis, inquit. Hoc enim constituto in philosophia constituta sunt omnia. Nam Pyrrho, Aristo, Erillus iam diu abiecti. Sed tamen enitar et, si minus multa mihi occurrent, non fugiam ista popularia. Piso, familiaris noster, et alia multa et hoc loco Stoicos irridebat: Quid enim? Vide, quantum, inquam, fallare, Torquate. 

Collatio igitur ista te nihil iuvat. Quare conare, quaeso. 

Res enim concurrent contrariae. Duo Reges: constructio interrete. Minime vero, inquit ille, consentit. Terram, mihi crede, ea lanx et maria deprimet. Diodorus, eius auditor, adiungit ad honestatem vacuitatem doloris. Omnes enim iucundum motum, quo sensus hilaretur. Tertium autem omnibus aut maximis rebus iis, quae secundum naturam sint, fruentem vivere. Nihil acciderat ei, quod nollet, nisi quod anulum, quo delectabatur, in mari abiecerat. 

', '286185');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('8', '20', '524', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Polemoni et iam ante Aristoteli ea prima visa sunt, quae paulo ante dixi. Bonum incolumis acies: misera caecitas. Septem autem illi non suo, sed populorum suffragio omnium nominati sunt. Nulla pr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Polemoni et iam ante Aristoteli ea prima visa sunt, quae paulo ante dixi. Bonum incolumis acies: misera caecitas. Septem autem illi non suo, sed populorum suffragio omnium nominati sunt. Nulla profecto est, quin suam vim retineat a primo ad extremum. Duo Reges: constructio interrete. Nam, ut sint illa vendibiliora, haec uberiora certe sunt. Quae similitudo in genere etiam humano apparet. 

Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Illa videamus, quae a te de amicitia dicta sunt. At hoc in eo M. Rationis enim perfectio est virtus; Est autem a te semper dictum nec gaudere quemquam nisi propter corpus nec dolere. Quo modo autem optimum, si bonum praeterea nullum est? Et hi quidem ita non sola virtute finem bonorum contineri putant, ut rebus tamen omnibus virtutem anteponant; Ne amores quidem sanctos a sapiente alienos esse arbitrantur. 

Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Quis suae urbis conservatorem Codrum, quis Erechthei filias non maxime laudat? Quod autem in homine praestantissimum atque optimum est, id deseruit. Vide, quantum, inquam, fallare, Torquate. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Vitae autem degendae ratio maxime quidem illis placuit quieta. 

Isto modo ne improbos quidem, si essent boni viri. Sed id ne cogitari quidem potest quale sit, ut non repugnet ipsum sibi. 

', '316496');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('9', '9', '567', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. De hominibus dici non necesse est. Quia nec honesto quic quam honestius nec turpi turpius. Non quaero, quid dicat, sed quid convenienter possit rationi et sententiae suae dicere. Quid de Platone ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. De hominibus dici non necesse est. Quia nec honesto quic quam honestius nec turpi turpius. Non quaero, quid dicat, sed quid convenienter possit rationi et sententiae suae dicere. Quid de Platone aut de Democrito loquar? Eaedem res maneant alio modo. Duo Reges: constructio interrete. Nam nec vir bonus ac iustus haberi debet qui, ne malum habeat, abstinet se ab iniuria. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Cum autem assumpta ratío est, tanto in dominatu locatur, ut omnia illa prima naturae hulus tutelae subiciantur. Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; Quae si potest singula consolando levare, universa quo modo sustinebit? 

Quid me istud rogas? An eum locum libenter invisit, ubi Demosthenes et Aeschines inter se decertare soliti sunt? Itaque et manendi in vita et migrandi ratio omnis iis rebus, quas supra dixi, metienda. Nunc de hominis summo bono quaeritur; Ergo illi intellegunt quid Epicurus dicat, ego non intellego? 

Universa enim illorum ratione cum tota vestra confligendum puto. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Age nunc isti doceant, vel tu potius quis enim ista melius? Quamquam id quidem, infinitum est in hac urbe; Quid de Platone aut de Democrito loquar? Si sapiens, ne tum quidem miser, cum ab Oroete, praetore Darei, in crucem actus est. Cur ipse Pythagoras et Aegyptum lustravit et Persarum magos adiit? 

An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Hunc vos beatum; Quoniam, si dis placet, ab Epicuro loqui discimus. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Multa sunt dicta ab antiquis de contemnendis ac despiciendis rebus humanis; Sed et illum, quem nominavi, et ceteros sophistas, ut e Platone intellegi potest, lusos videmus a Socrate. Sed haec ab Antiocho, familiari nostro, dicuntur multo melius et fortius, quam a Stasea dicebantur. Non dolere, inquam, istud quam vim habeat postea videro; 

', '114587');
			
INSERT INTO `articles` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('10', '18', '765', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Verum hoc idem saepe faciamus. Maximus dolor, inquit, brevis est. Aliud igitur esse censet gaudere, aliud non dolere. Philosophi autem in suis lectulis plerumque moriuntur. Duo Reges: constructio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Verum hoc idem saepe faciamus. Maximus dolor, inquit, brevis est. Aliud igitur esse censet gaudere, aliud non dolere. Philosophi autem in suis lectulis plerumque moriuntur. Duo Reges: constructio interrete. Beatum, inquit. 

Ut enim consuetudo loquitur, id solum dicitur honestum, quod est populari fama gloriosum. Aeque enim contingit omnibus fidibus, ut incontentae sint. Et harum quidem rerum facilis est et expedita distinctio. Quo plebiscito decreta a senatu est consuli quaestio Cn. Ergo id est convenienter naturae vivere, a natura discedere. Perturbationes autem nulla naturae vi commoventur, omniaque ea sunt opiniones ac iudicia levitatis. Sin autem eos non probabat, quid attinuit cum iis, quibuscum re concinebat, verbis discrepare? Sunt enim prima elementa naturae, quibus auctis vírtutis quasi germen efficitur. 

Ea, quae dialectici nunc tradunt et docent, nonne ab illis instituta sunt aut inventa sunt? Quod ea non occurrentia fingunt, vincunt Aristonem; 

Sed quid attinet de rebus tam apertis plura requirere? Bonum negas esse divitias, praeposìtum esse dicis? 

', '199870');
			
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
		