<template>
    <div class="min-h-full">
        <Disclosure
            as="nav"
            class="border-b-4 border-groove bg-white-600"
            style="
                border-bottom-color: rgba(17, 24, 39, var(--tw-bg-opacity));
                border-bottom-width: 1px;
            "
            v-slot="{ open }"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a class="navbar-brand" href="/">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 150 150"
                                    width="50"
                                    height="44"
                                    class="d-inline-block align-text-top"
                                >
                                    <path
                                        d="M0 0h150v150H0V0z"
                                        fill="none"
                                        id="Layer_3"
                                    />
                                    <g id="bidvest">
                                        <path
                                            id="path21581"
                                            class="st1"
                                            d="M105.6 79.7c14.7 0 27.6 9.8 27.6 24.4s-13 26.7-27.6 26.7H22.8V79.7h82.8z"
                                        />
                                        <path
                                            id="path21585"
                                            class="st1"
                                            d="M105.6 17.6c14.7 0 27.8 10.6 27.8 25.3s-13.2 26.5-27.8 26.5H22.8V17.6h82.8z"
                                        />
                                        <path
                                            id="path21589"
                                            d="M83.5 54.1V39.5l61 34.7-61 34.6V54.1z"
                                            fill="#bcbec0"
                                        />
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <Link
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    :class="[
                                        item.current
                                            ? 'bg-gray-900 text-white'
                                            : 'text-gray-900 hover:bg-gray-700 hover:text-white',
                                        'rounded-md px-3 py-2 text-sm font-medium',
                                    ]"
                                    :aria-current="
                                        item.current ? 'page' : undefined
                                    "
                                    >{{ item.name }}</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        >
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon
                                v-if="!open"
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                            <XMarkIcon
                                v-else
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                        </DisclosureButton>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="md:hidden">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <DisclosureButton
                        v-for="item in navigation"
                        :key="item.name"
                        as="a"
                        :href="item.href"
                        :class="[
                            item.current
                                ? 'bg-gray-900 text-white'
                                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                            'block rounded-md px-3 py-2 text-base font-medium',
                        ]"
                        :aria-current="item.current ? 'page' : undefined"
                        >{{ item.name }}</DisclosureButton
                    >
                </div>
            </DisclosurePanel>
        </Disclosure>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Dashboard
                </h1>
            </div>
        </header>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";

const navigation = [
    { name: "Dashboard", href: "/", current: true },
    { name: "Tools", href: "/toolspage" },
];
</script>
