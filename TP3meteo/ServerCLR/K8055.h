#pragma once

using namespace System::Runtime::InteropServices;

ref class K8055
{

public:
	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int OpenDevice(int CardAddress);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void CloseDevice();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int ReadAnalogChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ReadAllAnalog(int *Data1, int *Data2);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void OutputAnalogChannel(int Channel, int Data);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void OutputAllAnalog(int Data1, int Data2);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ClearAnalogChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void SetAllAnalog();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ClearAllAnalog();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void SetAnalogChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void WriteAllDigital(int Data);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ClearDigitalChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ClearAllDigital();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void SetDigitalChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void SetAllDigital();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static bool ReadDigitalChannel(int Channel);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int ReadAllDigital();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int ReadCounter(int CounterNr);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void ResetCounter(int CounterNr);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static void SetCounterDebounceTime(int CounterNr, int DebounceTime);

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int Version();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int SearchDevices();

	[DllImport("k8055d.dll", CharSet = CharSet::Ansi)]
	static int SetCurrentDevice(int lngCardAddress);
};

