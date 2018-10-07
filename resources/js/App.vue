<template>
	<div class="container">
		<div class="navbar">
			<span>CodeKerala</span>
		</div>
		<div class="content">
			<div class="panel">
				<div class="panel-title">Dashboard</div>
			</div>
			<div class="card-row">
				<div class="card-item" v-for="card in cards">
					<div class="card-inner">
						<div class="card-title">{{card.title}}</div>
						<div class="card-value" v-if="card.type ==='value'">{{card.value}}</div>
						<div class="card-chart" v-else>
							<la-cartesian :width="275" :height="40" :data="card.value">
								<la-area :color="card.color" animated prop="value"></la-area>
							</la-cartesian>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import { Cartesian, Area } from 'laue'
	import axios from 'axios'
	export default {
		components: {
			LaCartesian: Cartesian,
			LaArea: Area
		},
		mounted() {
			axios.get('/api/dashboard')
				.then((res) => {
					this.$set(this.$data, 'cards', res.data.cards)
				})
		},
		data() {
			return {
				cards: [],
				values: [
					{value: 0},
					{value: 1},
					{value: 10}
				]
			}
		}
	}
</script>