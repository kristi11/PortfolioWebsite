<div>
    <div>
        <x-dashboard.user-info :user="$user"/>
    </div>
    <div>
        <h1 class="flex justify-center mt-7 text-2xl dark:text-gray-300 underline mb-8">
            {{ ucwords($user->name).'\'s expertise' }}
        </h1>
    </div>
    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 gap-6 lg:gap-8 p-6 lg:p-8">
        <x-dashboard.user-skills :skills="$skills"/>
    </div>
    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

        <div>
            <x-dashboard.user-resume :resumes="$resumes"/>
        </div>

        <div>
            <x-dashboard.user-education :educations="$educations"/>
        </div>

        <div>
            <x-dashboard.user-projects :projects="$projects"/>
        </div>

        <div>
            <x-dashboard.user-services :services="$services"/>
        </div>

        <div>
            <x-dashboard.user-experience :experiences="$experiences"/>
        </div>

        <div>
            <x-dashboard.user-certificates :certificates="$certificates"/>
        </div>

    </div>
</div>
