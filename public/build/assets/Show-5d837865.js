import{A as p}from"./AppLayout-8cda59c2.js";import c from"./DeleteUserForm-6f8f7a97.js";import l from"./LogoutOtherBrowserSessionsForm-26982b30.js";import{S as s}from"./SectionBorder-89a5cf44.js";import u from"./TwoFactorAuthenticationForm-0c2b052a.js";import d from"./UpdatePasswordForm-9a9e0e07.js";import f from"./UpdateProfileInformationForm-b0f190bf.js";import{o as e,c as _,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-b34326a7.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-b9077f0a.js";import"./SectionTitle-a611c1e9.js";import"./DangerButton-88d41f8d.js";import"./TextInput-5c799c9b.js";import"./SecondaryButton-1ff6319c.js";import"./ActionMessage-79c74f65.js";import"./PrimaryButton-ca80636b.js";import"./InputLabel-16887569.js";import"./FormSection-52a057d9.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8",id:"Update"},w={key:0},A=i("div",{id:"Password"},null,-1),y={key:1},k={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(o,v)=>(e(),_(p,{Auth:!!o.$page.props.auth.user},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[o.$page.props.jetstream.canUpdateProfileInformation?(e(),r("div",w,[t(f,{user:o.$page.props.auth.user},null,8,["user"]),A,t(s)])):a("",!0),o.$page.props.jetstream.canUpdatePassword?(e(),r("div",y,[t(d,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),o.$page.props.jetstream.canManageTwoFactorAuthentication?(e(),r("div",k,[t(u,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),o.$page.props.jetstream.hasAccountDeletionFeatures?(e(),r(h,{key:3},[t(s),t(c,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1},8,["Auth"]))}};export{z as default};
