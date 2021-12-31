 <div class="p-6 mb-6 bg-gray-800 shadow-lg rounded-xl">
     <div>
         <p class="text-gray-400">
             @if ($notification->data['type'] == 'vote_notification')
                 <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                     class="block py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                     <span class="font-medium"> {{ $notification->data['user']['username'] }}
                     </span>
                     Voted
                     on your idea: <span class="font-medium">
                         {{ $notification->data['idea']['title'] }}
                     </span>
                 </a>
             @elseif ($notification->data['type'] == 'follow_notification')
                 <a href="#profile page}"
                     class="block py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                     <span class="font-medium">
                         {{ $notification->data['follower']['username'] }}
                     </span>
                     Start following you.
                 </a>
             @elseif ($notification->data['type'] == 'add_idea_notification')
                 <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                     class="block py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                     <span class="font-medium">
                         {{ $notification->data['user']['username'] }}
                     </span>
                     Posted new idea: <span class="font-medium">
                         {{ $notification->data['idea']['title'] }}
                     </span>
                 </a>
             @elseif ($notification->data['type'] == 'comment_notification')
                 <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                     class="block py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                     <span class="font-medium"> {{ $notification->data['user']['username'] }}
                     </span>
                     Commented
                     on your idea: <span class="font-medium">
                         {{ $notification->data['idea']['title'] }}
                     </span>
                 </a>
             @elseif ($notification->data['type'] == 'reply_notification')
                 <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                     class="block py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                     <span class="font-medium"> {{ $notification->data['user']['username'] }}
                     </span>
                     Replied to your comment on
                     on <span class="font-medium">
                         {{ $notification->data['idea']['title'] }}
                     </span>
                 </a>
             @endif
         </p>
         <div x-data="{ toggleCommentBox: false, alert: false }" class='mt-1'>
             <p class="text-sm font-medium text-gray-300">{{ $notification->created_at->diffForHumans() }}</p>
         </div>
     </div>
 </div>
