<!DOCTYPE html>
	<x-public-profile.head/>
	<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
	@livewireStyles
		<x-public-profile.header :user="$user"/>
		<x-public-profile.why-me :user="$user"/>
		<x-public-profile.socials :user="$user"/>
		<x-public-profile.services :user="$user"/>
		<x-public-profile.experience :user="$user"/>
		<x-public-profile.projects :user="$user"/>
		<x-public-profile.skills :user="$user"/>
		<x-public-profile.certificates :user="$user"/>
		<x-public-profile.education :user="$user"/>
		<x-public-profile.footer :user="$user"/>
		<x-public-profile.scripts/>
		<x-analytics/>
	@livewireScripts
	</body>
</html>
