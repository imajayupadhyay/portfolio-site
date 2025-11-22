<template>
    <Head title="404 - Page Not Found" />

    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 relative overflow-hidden flex items-center justify-center">
        <!-- Animated Background Grid -->
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>

        <!-- Floating Code Snippets -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div v-for="i in 20" :key="i"
                class="code-float absolute text-green-400/20 font-mono text-sm"
                :style="floatingCodeStyle(i)">
                {{ getRandomCode() }}
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Glitch Effect 404 -->
            <div class="relative mb-8">
                <h1 class="text-9xl sm:text-[12rem] lg:text-[16rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 glitch" data-text="404">
                    404
                </h1>
                <div class="glitch-overlay" data-text="404">404</div>
                <div class="glitch-overlay glitch-overlay-2" data-text="404">404</div>
            </div>

            <!-- Terminal Window -->
            <div class="bg-gray-800/90 backdrop-blur-lg rounded-2xl shadow-2xl border border-gray-700 overflow-hidden max-w-3xl mx-auto mb-8 animate-slide-up">
                <!-- Terminal Header -->
                <div class="bg-gray-900/90 px-4 py-3 flex items-center gap-2 border-b border-gray-700">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <span class="text-gray-400 text-sm font-mono ml-4">error.log</span>
                </div>

                <!-- Terminal Content -->
                <div class="p-6 sm:p-8 font-mono text-left">
                    <div class="space-y-3">
                        <p class="text-red-400 typing-animation">
                            <span class="text-gray-500">$</span> curl -X GET {{ currentPath }}
                        </p>
                        <p class="text-yellow-400 typing-animation" style="animation-delay: 0.5s;">
                            <span class="text-gray-500">!</span> Error: Route not found
                        </p>
                        <p class="text-blue-400 typing-animation" style="animation-delay: 1s;">
                            <span class="text-gray-500">→</span> Status: 404 Not Found
                        </p>
                        <p class="text-purple-400 typing-animation" style="animation-delay: 1.5s;">
                            <span class="text-gray-500">→</span> Message: The page you're looking for doesn't exist in this dimension
                        </p>
                        <div class="typing-animation" style="animation-delay: 2s;">
                            <p class="text-gray-500 mt-4"># Suggested actions:</p>
                            <div class="text-green-400 ml-4 space-y-1">
                                <p class="cursor-pointer hover:text-green-300 transition-colors" @click="navigateHome">
                                    <span class="text-gray-500">1.</span> return_to_home()
                                </p>
                                <p class="cursor-pointer hover:text-green-300 transition-colors" @click="goBack">
                                    <span class="text-gray-500">2.</span> navigate_back()
                                </p>
                                <p class="cursor-pointer hover:text-green-300 transition-colors" @click="contactSupport">
                                    <span class="text-gray-500">3.</span> contact_developer()
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in" style="animation-delay: 2.5s;">
                <a
                    href="/"
                    class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold overflow-hidden transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-blue-500/50"
                >
                    <span class="relative z-10 flex items-center gap-2">
                        <HomeIcon class="w-5 h-5" />
                        Back to Home
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>

                <button
                    @click="goBack"
                    class="px-8 py-4 bg-gray-800/90 backdrop-blur-sm text-gray-300 border border-gray-700 rounded-xl font-semibold hover:bg-gray-700/90 hover:border-gray-600 transform hover:scale-105 transition-all duration-300 flex items-center gap-2"
                >
                    <ArrowLeftIcon class="w-5 h-5" />
                    Go Back
                </button>
            </div>

            <!-- Fun Quote -->
            <div class="mt-12 animate-fade-in" style="animation-delay: 3s;">
                <p class="text-gray-400 italic text-lg">
                    "{{ randomQuote }}"
                </p>
            </div>
        </div>

        <!-- Animated Particles -->
        <div class="particles-container absolute inset-0 pointer-events-none">
            <div v-for="i in 50" :key="'particle-' + i"
                class="particle"
                :style="particleStyle(i)">
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import { HomeIcon, ArrowLeftIcon } from '@heroicons/vue/24/outline';

const currentPath = ref(window.location.pathname);

const quotes = [
    "In the midst of chaos, there is also opportunity. - Sun Tzu",
    "The best error message is the one that never shows up. - Thomas Fuchs",
    "It's not a bug, it's an undocumented feature!",
    "404: The page you seek cannot be found. But the wisdom you gain is eternal.",
    "Even the best developers get lost sometimes. Let's find our way back.",
    "This page is like my social life - doesn't exist.",
];

const randomQuote = computed(() => quotes[Math.floor(Math.random() * quotes.length)]);

const codeSnippets = [
    'if (page.exists) {',
    'const result = await fetch();',
    'return 404;',
    'console.error("Not Found");',
    'throw new Error();',
    'undefined is not a function',
    '} catch (error) {',
    'async function findPage() {',
    'null !== undefined',
    'let page = null;',
    'router.push("/404");',
    'HTTP/1.1 404 Not Found',
];

const getRandomCode = () => {
    return codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
};

const floatingCodeStyle = (index) => {
    return {
        left: `${Math.random() * 100}%`,
        top: `${Math.random() * 100}%`,
        animationDelay: `${Math.random() * 5}s`,
        animationDuration: `${15 + Math.random() * 10}s`,
    };
};

const particleStyle = (index) => {
    return {
        left: `${Math.random() * 100}%`,
        top: `${Math.random() * 100}%`,
        animationDelay: `${Math.random() * 3}s`,
        animationDuration: `${3 + Math.random() * 4}s`,
    };
};

const navigateHome = () => {
    window.location.href = '/';
};

const goBack = () => {
    if (window.history.length > 1) {
        window.history.back();
    } else {
        window.location.href = '/';
    }
};

const contactSupport = () => {
    window.location.href = '/contact';
};
</script>

<style scoped>
/* Grid Background */
.bg-grid-pattern {
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
    background-size: 50px 50px;
}

/* Glitch Effect */
.glitch {
    position: relative;
    animation: glitch-skew 1s infinite;
}

.glitch-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: inherit;
    font-weight: inherit;
    background: inherit;
    -webkit-background-clip: text;
    background-clip: text;
    opacity: 0.8;
    animation: glitch-anim 2s infinite;
    text-shadow: 2px 2px 0 #00ffff;
}

.glitch-overlay-2 {
    animation: glitch-anim 3s infinite reverse;
    text-shadow: -2px -2px 0 #ff00ff;
}

@keyframes glitch-anim {
    0% {
        clip-path: inset(40% 0 61% 0);
        transform: translate(0);
    }
    20% {
        clip-path: inset(92% 0 1% 0);
        transform: translate(-2px, 2px);
    }
    40% {
        clip-path: inset(43% 0 1% 0);
        transform: translate(2px, -2px);
    }
    60% {
        clip-path: inset(25% 0 58% 0);
        transform: translate(-2px, 2px);
    }
    80% {
        clip-path: inset(54% 0 7% 0);
        transform: translate(2px, -2px);
    }
    100% {
        clip-path: inset(58% 0 43% 0);
        transform: translate(0);
    }
}

@keyframes glitch-skew {
    0%, 100% {
        transform: skew(0deg);
    }
    20% {
        transform: skew(-0.5deg);
    }
    40% {
        transform: skew(0.5deg);
    }
    60% {
        transform: skew(-0.5deg);
    }
    80% {
        transform: skew(0.5deg);
    }
}

/* Typing Animation */
.typing-animation {
    opacity: 0;
    animation: typing-fade-in 0.5s ease-out forwards;
}

@keyframes typing-fade-in {
    from {
        opacity: 0;
        transform: translateX(-10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Slide Up Animation */
.animate-slide-up {
    animation: slide-up 0.8s ease-out;
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Fade In Animation */
.animate-fade-in {
    opacity: 0;
    animation: fade-in 0.8s ease-out forwards;
}

@keyframes fade-in {
    to {
        opacity: 1;
    }
}

/* Floating Code */
.code-float {
    animation: float-code 20s infinite linear;
}

@keyframes float-code {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 0.3;
    }
    90% {
        opacity: 0.3;
    }
    100% {
        transform: translateY(-100vh) rotate(360deg);
        opacity: 0;
    }
}

/* Particles */
.particle {
    position: absolute;
    width: 2px;
    height: 2px;
    background: rgba(96, 165, 250, 0.5);
    border-radius: 50%;
    animation: particle-float 5s infinite;
}

@keyframes particle-float {
    0%, 100% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100vh) translateX(50px);
        opacity: 0;
    }
}

/* Hover Effects */
.cursor-pointer:hover {
    text-decoration: underline;
}
</style>
