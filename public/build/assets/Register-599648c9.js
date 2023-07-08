import{T as p,o as c,c as _,w as i,a,b as s,k as g,u as o,e as w,g as d,f as h,l as y,n as v}from"./app-b34326a7.js";import{A as V}from"./AuthenticationCard-f99a5f06.js";import{_ as k}from"./Checkbox-a6189b24.js";import{_ as u,a as m}from"./TextInput-5c799c9b.js";import{_ as n}from"./InputLabel-16887569.js";import{_ as x}from"./PrimaryButton-ca80636b.js";import{A as b}from"./AppLayout-8cda59c2.js";import"./_plugin-vue_export-helper-c27b6911.js";const A={class:"flex justify-center"},P=["onSubmit"],$={class:"mt-4"},q={class:"mt-4"},B={class:"mt-4"},C={key:0,class:"mt-4"},N={class:"flex items-center"},U={class:"ml-2"},T=["href"],j=["href"],S={class:"flex items-center justify-end mt-4"},H={__name:"Register",props:{isAuth:Boolean},setup(E){const e=p({name:"",email:"",password:"",password_confirmation:"",terms:!1}),f=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})};return(l,t)=>(c(),_(b,{auth:l.auth},{default:i(()=>[a("div",A,[s(V,{class:"w-full lg:w-4/6 md:mx-6"},{default:i(()=>[a("form",{onSubmit:g(f,["prevent"])},[a("div",null,[s(n,{for:"name",value:"Name"}),s(u,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":t[0]||(t[0]=r=>o(e).name=r),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(m,{class:"mt-2",message:o(e).errors.name},null,8,["message"])]),a("div",$,[s(n,{for:"email",value:"Email"}),s(u,{id:"email",modelValue:o(e).email,"onUpdate:modelValue":t[1]||(t[1]=r=>o(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),s(m,{class:"mt-2",message:o(e).errors.email},null,8,["message"])]),a("div",q,[s(n,{for:"password",value:"Password"}),s(u,{id:"password",modelValue:o(e).password,"onUpdate:modelValue":t[2]||(t[2]=r=>o(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(m,{class:"mt-2",message:o(e).errors.password},null,8,["message"])]),a("div",B,[s(n,{for:"password_confirmation",value:"Confirm Password"}),s(u,{id:"password_confirmation",modelValue:o(e).password_confirmation,"onUpdate:modelValue":t[3]||(t[3]=r=>o(e).password_confirmation=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(m,{class:"mt-2",message:o(e).errors.password_confirmation},null,8,["message"])]),l.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(c(),w("div",C,[s(n,{for:"terms"},{default:i(()=>[a("div",N,[s(k,{id:"terms",checked:o(e).terms,"onUpdate:checked":t[4]||(t[4]=r=>o(e).terms=r),name:"terms",required:""},null,8,["checked"]),a("div",U,[d(" I agree to the "),a("a",{target:"_blank",href:l.route("terms.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Terms of Service",8,T),d(" and "),a("a",{target:"_blank",href:l.route("policy.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Privacy Policy",8,j)])]),s(m,{class:"mt-2",message:o(e).errors.terms},null,8,["message"])]),_:1})])):h("",!0),a("div",S,[s(o(y),{href:l.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:i(()=>[d(" Already registered? ")]),_:1},8,["href"]),s(x,{class:v(["ml-4",{"opacity-25":o(e).processing}]),disabled:o(e).processing},{default:i(()=>[d(" Register ")]),_:1},8,["class","disabled"])])],40,P)]),_:1})])]),_:1},8,["auth"]))}};export{H as default};
