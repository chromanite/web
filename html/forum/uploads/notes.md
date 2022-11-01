# Notes

| LAB  | SUBNET       | TARGET START | TARGET END  |
|------|--------------|--------------|-------------|
| PWK  | 10.11.1.0/24 | 10.11.1.1    | 10.11.1.254 |

---

### Control Panel

1. Once logged into the PWK VPN lab network, you can access your PWK control panel. The PWK control panel will help you revert your client and lab machines or book your exam.

2. Once you find the network-secret.txt files, you'll use the control panel, submit the contents of the file, and unlock the ability to revert machines located in the additional networks you've discovered.


---

### Client Machines
* You will be assigned three dedicated client machines that are used in conjunction with the course material and exercises. 


* This includes:
    1. Windows 10 client
    2. Debian Linux client
    3. Windows Server 2016 Domain Controller. 

</br>

* Revert the machine you wish to use via the student control panel whenever you connect to the VPN. 

* Reverting either the Windows 10 or Windows Server 2016 clients, both machines will be reverted. Your assigned client machines are automatically powered off and reverted to their initial state after you have been disconnected from the VPN for a period of time.

* With the above in mind, we highly recommend that you do not store any information on any of your client machines that you are not willing to lose.

---

### Topic Exercises

* Once you have successfully completed the objective, you will receive a flag in the form "OS{random-hash}". 


* Questions: 
    - Exercises usually (though not always) provide you with the exact objectives they must accomplish on the machine. The question provides a machine name that you can start directly inside the OTL. You can then connect to the machine through their Kali Linux VM and the course VPN pack.

* Machines:
    - All of the Topic Exercise VMs are contained in the student's own individual lab environment. That is, you do not share these machines with other students, and therefore you will be able to start, stop and revert the machines as necessary. The Topic Exercise machines neither replace the PWK shared lab environment, nor do they replace the three dedicated client machines assigned to each student.

* Flags:
    - Often found as the contents of text files, but they can be hidden in a variety of locations. Flags always have a definite length, but are randomized on each revert of the exercise machine. Flags are always of the form "OS{d8e8fca2dc0f896fd7cb4cb0031ba249}".

* Recommended SSH:
    ```
    ssh -o "UserKnownHostsFile=/dev/null" -o "StrictHostKeyChecking=no" student@192.168.50.52 -p 2222
    ```

---

### Report Writing

1. DO NOT include pages and pages of a tool output in your report unless it is absolutely relevant. Consider Nmap's output. There is no reason for you to include every single line from the output in your report as it does not add anything of value. If you have a point that you are trying to make, for example a very high number of SNMP services exposed on publicly accessible hosts, then use the –oG flag and grep out only those hosts with open SNMP ports.

2. Make use of screenshots wisely. The same rule applies as with the rest of the content you add to your report. Use a screenshot to make a point, not just to show awesome meterpreter output. For example, say you got root on a Linux host. Rather than displaying 15 screenshots of various directory listings only a root user could access, just include a single screenshot of the whoami command output. A technically savvy reader may only need this one thing to understand what you have achieved.

3. Include extra materials as additional supporting documents. If you have content that will drive up the page count but not be interesting to your entire audience, consider providing additional supporting documents in addition to the report. The readers who need this information can still inspect the supporting documentation and the quality of the report won't suffer.

4. Perhaps most importantly, refer back to the objective of the assessment. Think about the point you are trying to make as it relates to the objective and about how each piece of information will or will not reinforce that point.

---

### Exam Grading

* Starting today (August 3, 2022), the following criteria will be accepted for Bonus Points:

    1. Students must have 80% correct solutions submitted for the PEN-200 Topic Exercises for each Topic

    2. Students must submit the proof.txt of at least 30 PEN-200 Lab Machines
    That’s it! No need to submit a lab report, and no more restrictions on which machines can and cannot be included. This means that the only deliverable on the day after your exam is the traditional Exam Report.

    3. [Exam scoring referral link](https://www.offensive-security.com/offsec/sunsetting-pen-200-legacy-topic-exercises/#:~:text=How%20many%20bonus%20points%20can,allocated%20to%20the%20exam%20attempts.)

* How many bonus points can I get?
    - Each student is eligible for 10 bonus points per exam attempt. All 10 points are provided based on meeting the two objectives defined above. No partial bonus points are allocated to the exam attempts.

---

### About exam

1. The OSCP certification exam simulates a live network in a private VPN that contains a small number of vulnerable machines. To pass, you must score 70 points. Points are awarded for limited access as well as full system compromise. The environment is completely dedicated to you for the duration of the exam, and you will have 23 hours and 45 minutes to complete it.

2. Specific instructions for each target machine will be located in your exam control panel, which will only become available to you once your exam begins.

3. To ensure the integrity of our certifications, the exam will be remotely proctored. You are required to be present 15 minutes before your exam start time to perform identity verification and other pre-exam tasks. In order to do so, click on the Exam tab in the Offsec Training Library, which is situated at the top right of your screen. During these pre-exam verification steps, you will be provided with a VPN connectivity pack.

4. Once the exam has ended, you will have an additional 24 hours to put together your exam report and document your findings. You will be evaluated on the quality and content of the exam report, so please include as much detail as possible and make sure your findings are all reproducible.

5. Once your exam files have been accepted, your exam will be graded and you will receive your results in 10 business days. If you achieve a passing score, we will ask you to confirm your physical address so we can mail your certificate. If you came up short, then we will notify you, and you may purchase a certification retake using the appropriate links.

6. We highly recommend that you carefully schedule your exam for a 48-hour window when you can ensure no outside distractions or commitments. Also, please note that exam availability is handled on a first come, first served basis, so it is best to schedule your exam as far in advance as possible to ensure your preferred date is available. For additional information regarding the exam, we encourage you to take some time to go over the OSCP exam guide.