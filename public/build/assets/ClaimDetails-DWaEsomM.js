import{Z as u,i as _,r,o,f as a,a as n,w as l,F as i,b as e,t as h,j as p,n as b}from"./app-HN4yhc_G.js";import{_ as f}from"./GuestLayout-TO6PLe_a.js";import g from"./HomeBanner-Dap0dIPJ.js";import y from"./Categories-Dh4I55PW.js";import{_ as x}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./NavLink-cyEJJ7mr.js";const v={name:"ClaimDetails",components:{Head:u,Link:_,HomeBanner:g,Categories:y,GuestLayout:f},props:{claimables:{type:Array,required:!0},title:{type:String,required:!0},slug:{type:String,required:!0},content:{type:String,required:!0}}},L=e("meta",{name:"description",content:"Letselschade description"},null,-1),k={class:"pt-12 pb-14 px-6"},H={class:"container mx-auto"},C={class:"lg:grid grid-cols-3 gap-5"},T={class:"max-lg:mb-5 col-span-2"},w=["innerHTML"],M=["innerHTML"],q=e("a",{href:"/letselschadeclaimen",class:"px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br from-slate-500 to-sky-900 hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3 inline-block"},"Terug naar letselschadeclaimen",-1),B={class:""},S=["href","innerHTML"];function D(G,F,t,N,V,j){const c=r("Head"),d=r("GuestLayout");return o(),a(i,null,[n(c,null,{default:l(()=>[e("title",null,"Letselschade Claimen - "+h(t.title),1),L]),_:1}),n(d,null,{default:l(()=>[e("div",k,[e("div",H,[e("div",C,[e("div",T,[e("h2",{class:"font-bold text-slate-700 text-3xl mb-3",innerHTML:t.title},null,8,w),e("div",{class:"text-2xl mb-5",innerHTML:t.content},null,8,M),q]),e("div",B,[e("ul",null,[(o(!0),a(i,null,p(t.claimables,(s,m)=>(o(),a("li",{key:m},[e("a",{href:`/letselschadeclaimen/${s.slug}`,innerHTML:s.name,class:b((s.slug===t.slug?"from-slate-600 to-sky-950 ":"from-slate-500 to-sky-900 ")+"px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3")},null,10,S)]))),128))])])])])])]),_:1})],64)}const J=x(v,[["render",D]]);export{J as default};
