import z from"./Categories-Dh4I55PW.js";import{R as U}from"./RadioGroup-6cdPFj_f.js";import{_ as q}from"./Checkbox-Cfz5YYXr.js";import{r as y,o as t,f as a,b as l,d as f,t as o,g as c,a as d,n as r,l as w,v as V,F as x,j,w as m,C as g}from"./app-HN4yhc_G.js";import{_ as C}from"./_plugin-vue_export-helper-DlAUqK2U.js";const N={name:"Step 1",components:{Categories:z,RadioGroup:U,Checkbox:q},props:{letselschade:{type:Object,required:!0},questions:{type:Object,required:!0},invalidFields:{type:Array,required:!0}},created(){this.letselschade.category&&this.$nextTick(()=>{this.scrollTo("step1-aansprakelijkheid")})},emits:["update:selectedValue","scroll-to"],watch:{},data(){return{jaNee:[{label:"Ja",value:1},{label:"Nee",value:0}],wanneer_ongevals:["Korter dan 1 maand geleden","Maximaal 1 jaar geleden","Tussen 1 en 3 jaar geleden","Langer dan 3 jaar geleden"],manier_verhalen:["Via rechtsbijstandsverzekering","Via letselschadebureau","Via advocaat","Zelfstandig","Op een andere manier"],juridische_hulpen:["Ja","Ja, zo spoedig mogelijk","Ik wil eerst meer informatie"],interesse_overname_secondopinions:["Een overname","Een second opinion","Meer informatie"]}},methods:{handleRadio(k,i){this.$emit("update:selectedValue",k,i)},scrollTo(k){this.$emit("scroll-to",k)}}},p={class:"py-10 max-md:px-5"},T={class:"container mx-auto"},R={class:"font-logo mb-2 text-3xl text-blue-900"},O={key:0},E=l("p",{class:"text-2xl"}," In dit onderdeel kijken we naar de situatie van het ongeval en in hoeverre er een aansprakelijke tegenpartij bestaat op wie de schade verhaald kan worden. ",-1),B={class:"py-10",id:"step1-categories"},M={class:"container mx-auto"},J={key:0,class:"text-slate-500 italic max-md:text-center mb-3"},K={key:0,class:"max-md:px-5"},S={key:0,class:"py-10"},A={class:"container mx-auto pb-2",id:"step1-erkenning"},D={class:"md:flex items-center"},I={for:"erkenning_0"},L={class:"flex-grow mx-2 relative"},Z={class:"absolute inset-0 flex items-center max-md:hidden","aria-hidden":"true"},G={class:"relative lg:flex justify-end"},H={class:"container mx-auto mb-5",id:"step1-aansprakelijkheid"},P={class:"md:grid grid-cols-2 gap-8"},Q=["placeholder"],W=["for"],X={class:"container mx-auto pb-2 mb-5",id:"step1-eerder_verhaal"},Y={class:"lg:flex items-center"},$={for:"eerder_verhaal_0"},ee={class:"flex-grow mx-2 relative"},le={class:"absolute inset-0 lg:flex items-center max-md:hidden","aria-hidden":"true"},te={class:"relative lg:flex justify-end"},ae={key:1,class:"container mx-auto pb-2 mb-5"},ie={class:"lg:flex items-center",id:"step1-durf"},se={for:"durf_aansprakelijk_0"},de={class:"flex-grow mx-2 relative"},ne={class:"absolute inset-0 flex items-center max-md:hidden","aria-hidden":"true"},oe={class:"relative lg:flex justify-end"},re={key:0,class:"container mx-auto mb-5 border rounded-xl p-8 shadow-lg"},ce={id:"step1-manier"},he=["for"],_e={key:0,class:"container mx-auto mb-5 border rounded-xl p-8 shadow-lg"},ue={id:"step1-juridisch"},ve=["for"],me={id:"manier_wrapper"},ge={key:0,class:"mt-5"},fe={class:"container mx-auto",id:"step1-reden"},xe={class:"lg:grid grid-cols-2 gap-5"},ke=l("h3",{class:"font-title text-3xl mb-3"}," Bent u ergens ontevreden over? ",-1),be=l("p",{class:"mb-5"}," Ontevredenheid over een schadebehandelaar is geen onbekend verschijnsel. U bezoekt deze website waarschijnlijk omdat u met vragen zit. Hieronder kunt u deze aangeven waar u mee zit. Een second opinion of overname van uw zaak door een van onze betrouwbare experts behoort ook tot de mogelijkheden. ",-1),je=["placeholder"],ye=l("h3",{class:"font-title text-3xl mb-3"}," Kan een ander mij wel helpen? ",-1),we=l("p",{class:"mb-5"}," Een overname van uw zaak door onze experts is kosteloos. Er zal vooraf een gesprek plaatsvinden over de zaak en mogelijke overname. Met een schriftelijke machtiging kan een zaak door ons worden overgenomen. Bij een overname hoeft u zich geen zorgen te maken over kosten of uw huidige behandelaar; uw recht tot overname is wettelijk bepaald. ",-1),Ve=["for"],Fe={key:2,class:"container mx-auto pb-2 my-5"},ze={key:0,id:"step1-datategenpartij"},Ue={class:"lg:flex items-center"},qe={class:"text-3xl font-title flex-shrink-0"},Ce={for:"data_tegenpartij_0"},Ne={class:"flex-grow mx-2 relative"},pe=l("div",{class:"absolute inset-0 flex items-center max-md:hidden","aria-hidden":"true"},[l("div",{class:"w-full border-t border-gray-300"})],-1),Te={class:"relative lg:flex justify-end"},Re={key:0,class:"mt-5"},Oe={class:"lg:flex items-center",id:"step1-politie"},Ee={class:"text-3xl font-title flex-shrink-0"},Be={for:"politie_0"},Me={class:"flex-grow mx-2 relative"},Je={class:"absolute inset-0 lg:flex items-center max-md:hidden","aria-hidden":"true"},Ke={class:"relative lg:flex justify-end"},Se={key:0,class:"mt-5"},Ae={class:"lg:flex items-center",id:"step1-inspectie"},De={for:"politie_inspectie_0"},Ie={class:"flex-grow mx-2 relative"},Le={class:"absolute inset-0 flex items-center max-md:hidden","aria-hidden":"true"},Ze={class:"relative lg:flex justify-end"};function Ge(k,i,e,He,h,_){const F=y("Categories"),v=y("radio-group"),b=y("checkbox");return t(),a(x,null,[l("div",p,[l("div",T,[l("h2",R,[f(" Aansprakelijkheid "),e.letselschade.category?(t(),a("span",O,"- "+o(e.letselschade.category),1)):c("",!0)]),E])]),l("div",B,[l("div",M,[e.letselschade.category?c("",!0):(t(),a("p",J," Kies één van deze voorbeelden ")),d(F)])]),e.letselschade.category?(t(),a("div",K,[e.letselschade.category==="verkeersongeval"||e.letselschade.category==="bedrijfsongeval"?(t(),a("div",S,[l("div",A,[l("div",null,[l("div",D,[l("p",{class:r("text-3xl font-title flex-shrink-0"+(e.invalidFields.length&&e.invalidFields.includes("erkenning")?" text-red-700 error-field":""))},[l("label",I,o(e.questions.erkenning),1)],2),l("div",L,[l("div",Z,[l("div",{class:r("w-full border-t"+(e.invalidFields.length&&e.invalidFields.includes("erkenning")?" border-red-700 error-field":" border-gray-300"))},null,2)]),l("div",G,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.erkenning,variable:"erkenning"},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])])])):c("",!0),l("div",H,[l("div",P,[w(l("textarea",{class:r("w-full h-64 rounded mb-5"+(e.invalidFields.length&&e.invalidFields.includes("toelichting_aansprakelijkheid")?" border-red-700 error-field":" border-slate-200")),placeholder:e.questions.toelichting_aansprakelijkheid,"onUpdate:modelValue":i[0]||(i[0]=s=>e.letselschade.toelichting_aansprakelijkheid=s)},null,10,Q),[[V,e.letselschade.toelichting_aansprakelijkheid]]),l("div",null,[l("p",{class:r("text-3xl font-title mb-3"+(e.invalidFields.length&&e.invalidFields.includes("wanneer_ongeval")?" text-red-700 error-field":""))},o(e.questions.wanneer_ongeval),3),(t(!0),a(x,null,j(h.wanneer_ongevals,(s,n)=>(t(),a("label",{key:n,for:`ong_${n}`,class:"block mb-3 text-xl"},[d(b,{type:"radio",checked:e.letselschade.wanneer_ongeval===s,name:"wanneer_ongeval",value:s,id:`ong_${n}`,class:"mr-3","onUpdate:checked":i[1]||(i[1]=u=>e.letselschade.wanneer_ongeval=u),onChange:i[2]||(i[2]=()=>_.scrollTo("step1-eerder_verhaal"))},null,8,["checked","value","id"]),f(" "+o(s),1)],8,W))),128))])])]),l("div",X,[l("div",null,[l("div",Y,[l("p",{class:r("text-3xl font-title flex-shrink-0"+(e.invalidFields.length&&e.invalidFields.includes("eerder_verhaal")?" text-red-700 error-field":""))},[l("label",$,o(e.questions.eerder_verhaal),1)],2),l("div",ee,[l("div",le,[l("div",{class:r("w-full border-t"+(e.invalidFields.length&&e.invalidFields.includes("eerder_verhaal")?" border-red-700 error-field":" border-gray-300"))},null,2)]),l("div",te,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.eerder_verhaal,variable:"eerder_verhaal",onChange:i[3]||(i[3]=()=>_.scrollTo("step1-manier"))},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])]),e.letselschade.category==="bedrijfsongeval"?(t(),a("div",ae,[l("div",null,[l("div",ie,[l("p",{class:r("text-3xl font-title flex-shrink-0"+(e.invalidFields.length&&e.invalidFields.includes("durf_aansprakelijk")?" text-red-700 error-field":""))},[l("label",se,o(e.questions.durf_aansprakelijk),1)],2),l("div",de,[l("div",ne,[l("div",{class:r("w-full border-t"+(e.invalidFields.length&&e.invalidFields.includes("durf_aansprakelijk")?" border-red-700 error-field":" border-gray-300"))},null,2)]),l("div",oe,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.durf_aansprakelijk,variable:"durf_aansprakelijk"},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])])):c("",!0),d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.eerder_verhaal===1?(t(),a("div",re,[l("div",ce,[l("p",{class:r("text-3xl font-title mb-3"+(e.invalidFields.length&&e.invalidFields.includes("manier_verhaal")?" text-red-700 error-field":""))},o(e.questions.manier_verhaal),3),(t(!0),a(x,null,j(h.manier_verhalen,(s,n)=>(t(),a("label",{key:n,for:`verhaal_${n}`,class:"block mb-3 text-xl"},[d(b,{type:"radio",checked:e.letselschade.manier_verhaal===s,name:"manier_verhaal",value:s,id:`verhaal_${n}`,class:"mr-3","onUpdate:checked":i[4]||(i[4]=u=>e.letselschade.manier_verhaal=u),onChange:i[5]||(i[5]=()=>_.scrollTo("manier_wrapper"))},null,8,["checked","value","id"]),f(" "+o(s),1)],8,he))),128))])])):c("",!0)]),_:1}),d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.eerder_verhaal===0||e.letselschade.manier_verhaal==="Zelfstandig"||e.letselschade.manier_verhaal==="Op een andere manier"?(t(),a("div",_e,[l("div",ue,[l("p",{class:r("text-3xl font-title mb-3"+(e.invalidFields.length&&e.invalidFields.includes("juridische_hulp")?" text-red-700 error-field":""))},o(e.questions.juridische_hulp),3),(t(!0),a(x,null,j(h.juridische_hulpen,(s,n)=>(t(),a("label",{key:n,for:`hulp_${n}`,class:"block mb-3 text-xl"},[d(b,{type:"radio",checked:e.letselschade.juridische_hulp===s,name:"juridische_hulp",value:s,id:`hulp_${n}`,class:"mr-3","onUpdate:checked":i[6]||(i[6]=u=>e.letselschade.juridische_hulp=u)},null,8,["checked","value","id"]),f(" "+o(s),1)],8,ve))),128))])])):c("",!0)]),_:1}),l("div",me,[d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.eerder_verhaal===1&&(e.letselschade.manier_verhaal==="Via rechtsbijstandsverzekering"||e.letselschade.manier_verhaal==="Via letselschadebureau"||e.letselschade.manier_verhaal==="Via advocaat")?(t(),a("div",ge,[l("div",fe,[l("div",xe,[l("div",null,[ke,be,w(l("textarea",{class:r("w-full h-64 rounded mb-5"+(e.invalidFields.length&&e.invalidFields.includes("reden_ontevreden")?" border-red-700 error-field":" border-slate-200")),placeholder:e.questions.reden_ontevreden,"onUpdate:modelValue":i[7]||(i[7]=s=>e.letselschade.reden_ontevreden=s)},null,10,je),[[V,e.letselschade.reden_ontevreden]])]),l("div",null,[ye,we,l("div",null,[l("p",{class:r("text-3xl font-title mb-3"+(e.invalidFields.length&&e.invalidFields.includes("interesse_overname_secondopinion")?" text-red-700 error-field":""))},o(e.questions.interesse_overname_secondopinion),3),(t(!0),a(x,null,j(h.interesse_overname_secondopinions,(s,n)=>(t(),a("label",{key:n,for:`secondOpinion_${n}`,class:"block mb-3 text-xl"},[d(b,{type:"radio",checked:e.letselschade.interesse_overname_secondopinion===s,name:"interesse_overname_secondopinion",value:s,id:`secondOpinion_${n}`,class:"mr-3","onUpdate:checked":i[8]||(i[8]=u=>e.letselschade.interesse_overname_secondopinion=u)},null,8,["checked","value","id"]),f(" "+o(s),1)],8,Ve))),128))])])])])])):c("",!0)]),_:1})]),e.letselschade.erkenning===0||e.letselschade.category==="dieren"||e.letselschade.category==="wegdek"?(t(),a("div",Fe,[d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.category!=="bedrijfsongeval"?(t(),a("div",ze,[l("div",Ue,[l("p",qe,[l("label",Ce,o(e.questions.data_tegenpartij),1)]),l("div",Ne,[pe,l("div",Te,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.data_tegenpartij,variable:"data_tegenpartij"},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])):c("",!0)]),_:1}),d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.category!=="bedrijfsongeval"?(t(),a("div",Re,[l("div",Oe,[l("p",Ee,[l("label",Be,o(e.questions.politie),1)]),l("div",Me,[l("div",Je,[l("div",{class:r("w-full border-t"+(e.invalidFields.length&&e.invalidFields.includes("politie")?" border-red-700 error-field":" border-gray-300"))},null,2)]),l("div",Ke,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.politie,variable:"politie"},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])):c("",!0)]),_:1}),d(g,{name:"slide-fade-down"},{default:m(()=>[e.letselschade.category==="bedrijfsongeval"||e.letselschade.category==="wegdek"?(t(),a("div",Se,[l("div",Ae,[l("p",{class:r("text-3xl font-title flex-shrink-0"+(e.invalidFields.length&&e.invalidFields.includes("politie_inspectie")?" text-red-700 error-field":""))},[l("label",De,o(e.questions.politie_inspectie),1)],2),l("div",Ie,[l("div",Le,[l("div",{class:r("w-full border-t"+(e.invalidFields.length&&e.invalidFields.includes("politie_inspectie")?" border-red-700 error-field":" border-gray-300"))},null,2)]),l("div",Ze,[d(v,{options:h.jaNee,"onUpdate:selectedValue":_.handleRadio,selectedValue:e.letselschade.politie_inspectie,variable:"politie_inspectie"},null,8,["options","onUpdate:selectedValue","selectedValue"])])])])])):c("",!0)]),_:1})])):c("",!0)])):c("",!0)],64)}const $e=C(N,[["render",Ge]]);export{$e as default};
