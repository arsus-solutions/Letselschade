import{_ as i}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{o as t,f as r,F as u,j as l,t as d}from"./app-HN4yhc_G.js";const c={name:"Select",emits:["update:selected"],props:{options:{type:Array,required:!0},name:{type:String,required:!0},variable:{type:String,required:!0}},methods:{updateSelection(s){this.$emit("update:selected",this.variable,s.target.value)}}},p=["id"],m=["value"];function _(s,a,n,f,b,o){return t(),r("select",{onChange:a[0]||(a[0]=e=>o.updateSelection(e)),id:n.name,class:"mt-1 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm rounded-md"},[(t(!0),r(u,null,l(n.options,e=>(t(),r("option",{key:e,value:e.value},d(e.label),9,m))),128))],40,p)}const S=i(c,[["render",_]]);export{S};
