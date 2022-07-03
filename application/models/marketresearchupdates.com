curl -I -k https://mail.marketresearchupdates.com

zmprov ms $(mail.marketresearchupdates.com) zimbraMtaAuthTarget TRUE

 zmprov gs mail.marketresearchupdates.com | grep zimbraMtaMyNetworks


 host -t mx mail.marketresearchupdates.com

 host -t a mail.marketresearchupdates.com


 zmprov ms mail.marketresearchupdates.com zimbraMtaRelayHost mailrelay.marketresearchupdates.com


 echo mailrelay.marketresearchupdates.com username:password > /opt/zimbra/conf/relay_password

 postmap -q mailrelay.marketresearchupdates.com /opt/zimbra/conf/relay_password

 zmprov ms mail.marketresearchupdates.com zimbraMtaSmtpSaslPasswordMaps lmdb:/opt/zimbra/conf/relay_password


 zmprov ms mail.marketresearchupdates.com zimbraMtaSmtpSaslAuthEnable yes

 postconf -e smtp_cname_overrides_Servername=no
 zmlocalconfig -e postfix_smtp_cname_overrides_Servername=no

 zmprov ms mail.marketresearchupdates.com zimbraMtaSmtpCnameOverridesServername no

 zmprov ms mail.marketresearchupdates.com zimbraMtaLmtpHostLookup native