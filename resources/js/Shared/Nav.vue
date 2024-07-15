<template>
	<nav >
		<ul class="flex list-disk list-inside space-x-4">
			<li>
				<NavLink href="/" :active="$page.url === '/'">Home</NavLink>

			</li>
			<li>
				<NavLink href="/users" :active="$page.url.startsWith('/users')">Users</NavLink>

			</li>
			<li>
				<NavLink href="/settings" :active="$page.url.startsWith('/settings')">Settings</NavLink>
			</li>
			<li>
				<NavLink href="/getout" :active="$page.url.startsWith('/getout')" method="post" :data="{ foo: 'bar' }"
					as="button">
					GetOut</NavLink>

			</li>
		</ul>
	</nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import NavLink from '@/Components/NavLink.vue'
</script>